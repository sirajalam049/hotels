<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/includes/conn.php';

    class Models{
        protected $tableName;

        public function getTableData(){
            con();
            $sql = $GLOBALS['con']->prepare("SELECT * FROM ".$this->tableName);
            $sql->execute()
                or die('SQL Execution failed. '.$GLOBALS['con']->error);
            $row = $sql->get_result();
            $sql->close();
            $GLOBALS['con']->close();
            return $row;
        }

        // Accept id and return row of that id
        public function getRow($id){
            con();
            $sql = $GLOBALS['con']->prepare("SELECT * FROM ".$this->tableName." WHERE id = ?");
            $sql->bind_param('i', $id)
                or die('Binding Failed. '.$GLOBALS['con']->error);
            $sql->execute()
                or die('SQL Execution failed. '.$GLOBALS['con']->error);
            $row = $sql->get_result()->fetch_assoc();
            $sql->close();
            $GLOBALS['con']->close();
            return $row;
        }

        public function gettableName(){
            return $this->tableName;
        }

        public function insertData(){
        }

        // Used only when the User is the FORIEGN KEY
        public function countUserAssociatedData(){
            con();
            $sql = "SELECT COUNT(id) AS total FROM ".$this->tableName." WHERE user_id = ".$_COOKIE['id'];
            $total = $GLOBALS['con']->query($sql)->fetch_assoc()['total'];
            $GLOBALS['con']->close();
            return $total;
        }

        // Used only when the User is the FORIEGN KEY
        public function getUserAssociatedData(){
            con();
            $sql = "SELECT * FROM ".$this->tableName." WHERE user_id = ".$_COOKIE['id'];
            $result = $GLOBALS['con']->query($sql);
            $GLOBALS['con']->close();
            return $result;
        }
    }

    class Hotels extends Models{
        protected $tableName = "hotels";

        public function incVisitors($id){
            con();
            $sql = "UPDATE ".$this->tableName." SET visitors = visitors + 1 WHERE id = ".$id;
            $GLOBALS['con']->query($sql)
                or die('Query Failed. '.$GLOBALS['con']->error);
            $GLOBALS['con']->close();
        }

    }

    class Bookings extends Models{
        protected $tableName = "bookings";

        public function insertData(){
            con();
            $sql = $GLOBALS['con']->prepare("INSERT INTO ".$this->tableName." VALUES (NULL, ?, ? ,?, ?, ?, ?) ");
            $sql->bind_param('siiiis', $date, $hotel_id, $user_id, $total_rooms, $days, $booking_date)
                or die('Binding Failed. '.$GLOBALS['con']->error);
            
            $date = $_POST['date'];
            $hotel_id = $_SESSION['hotel_id'];
            $user_id = $_COOKIE['id'];
            $total_rooms = $_POST['total_rooms'];
            $days = $_POST['nights'];
            date_default_timezone_set('Asia/Kolkata');
            $booking_date = date('y-m-d h:i:s');

            $sql->execute()
                or die('Execution Failed. '.$GLOBALS['con']->error);
            $sql->close();
            $GLOBALS['con']->close();
        }
    }

    class Drafts extends Models{
        protected $tableName = "drafts";

        public function insertData(){
            con();
            $sql = $GLOBALS['con']->prepare("INSERT INTO ".$this->tableName." VALUES(NULL, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE date = ?, total_rooms = ?, days = ?")
                or die('Preparation Failed. '.$GLOBALS['con']->error);
            $sql->bind_param('siiiisii', $date, $hotel_id, $user_id, $total_rooms, $days, $date, $total_rooms, $days)
                or die('Binding Failed. '.$GLOBALS['con']->error);
            $date = $_POST['date'] == ''?NULL:$_POST['date'];
            $hotel_id = $_POST['hotel_id'] == ''?NULL:$_POST['hotel_id'];
            $user_id = $_COOKIE['id'];
            $total_rooms = $_POST['total_rooms'] == ''?NULL:$_POST['total_rooms'];
            $days = $_POST['nights'] == ''?NULL:$_POST['nights'];
            $sql->execute()
                or die('Execution Failed. '.$GLOBALS['con']->error);
            $sql->close();
            $GLOBALS['con']->close();
        }

        public function getDraftHotel($hotel_id){
            con();
            $sql = $GLOBALS['con']->prepare("SELECT * FROM ".$this->tableName." WHERE hotel_id = ? AND user_id = ?")
                or die('Preparation Failed. '.$GLOBALS['con']->error);
            $sql->bind_param('ii', $hotel_id, $_COOKIE['id'])
                or die('Binding Failed. '.$GLOBALS['con']->error);
            $sql->execute()
                or die('Execution Failed. '.$GLOBALS['con']->error);
            $hotel = $sql->get_result()->fetch_assoc();
            $sql->close();
            $GLOBALS['con']->close();
            return $hotel;
        }

        public function clearDraft($hotel_id){
            con();
            $sql = $GLOBALS['con']->prepare("DELETE FROM ".$this->tableName." WHERE hotel_id = ? AND user_id = ?")
                or die('Preparation Failed. '.$GLOBALS['con']->error);
            $sql->bind_param('ii', $hotel_id, $_COOKIE['id'])
                or die('Binding Failed. '.$GLOBALS['con']->error);
            $sql->execute()
                or die('Execution Failed. '.$GLOBALS['con']->error);
                $sql->close();
                $GLOBALS['con']->close();
        }
    }

    class Users extends Models{
        protected $tableName = "users";

        public function insertData(){
            con();
            $sql = $GLOBALS['con']->prepare("INSERT INTO ".$this->tableName." VALUES (NULL, ?, ?, ?)");
            $pswd = hash('sha256', $_POST['pswd']);
            $sql->bind_param('sss', $_POST['name'], $_POST['email'], $pswd)
                or die('Binding Failed. '.$GLOBALS['con']->error);
            $sql->execute()
                or die('Execution Failed. '.$GLOBALS['con']->error);
            $sql->close();
            $GLOBALS['con']->close();
        }

        public function userLogin(){
            con();
            $sql = $GLOBALS['con']->prepare("SELECT * FROM ".$this->tableName." WHERE email = ? AND pswd = ?");
            $pswd = hash('sha256', $_POST['pswd']);
            $sql->bind_param('ss', $_POST['email'], $pswd)
                or die('Binding Failed.'.$GLOBALS['con']->error);
            $sql->execute()
                or die('Execution Failed.'.$GLOBALS['con']->error);
            $result = $sql->get_result();
            $sql->close();
            $GLOBALS['con']->close();
            return $result;

        }
    }
?>