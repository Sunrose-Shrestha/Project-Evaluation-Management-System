<?php
namespace Phppot;

class Member
{

    private $ds;

    function __construct()
    {
        require_once __DIR__ . '/../lib/DataSource1.php';
        $this->ds = new DataSource();
    }

    /**
     * to check if the username already exists
     *
     * @param string $leadname
     * @return boolean
     */
    public function isLeadnameExists($leadname)
    {
        $query = 'SELECT * FROM student where leadname = ?';
        $paramType = 's';
        $paramValue = array(
            $leadname
        );
        $resultArray = $this->ds->select($query, $paramType, $paramValue);
        $count = 0;
        if (is_array($resultArray)) {
            $count = count($resultArray);
        }
        if ($count > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function isMembernameExists($membername)
    {
        $query = 'SELECT * FROM student where membername = ?';
        $paramType = 's';
        $paramValue = array(
            $membername
        );
        $resultArray = $this->ds->select($query, $paramType, $paramValue);
        $count = 0;
        if (is_array($resultArray)) {
            $count = count($resultArray);
        }
        if ($count > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    /**
     * to check if the email already exists
     *
     * @param string $leademail
     * @return boolean
     */
    public function isLeadEmailExists($leademail)
    {
        $query = 'SELECT * FROM student where leademail = ?';
        $paramType = 's';
        $paramValue = array(
            $leademail
        );
        $resultArray = $this->ds->select($query, $paramType, $paramValue);
        $count = 0;
        if (is_array($resultArray)) {
            $count = count($resultArray);
        }
        if ($count > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function isMemberEmailExists($memberemail)
    {
        $query = 'SELECT * FROM student where memberemail = ?';
        $paramType = 's';
        $paramValue = array(
            $memberemail
        );
        $resultArray = $this->ds->select($query, $paramType, $paramValue);
        $count = 0;
        if (is_array($resultArray)) {
            $count = count($resultArray);
        }
        if ($count > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    /**
     * to signup / register a user
     *
     * @return string[] registration status message
     */
    public function registerMember()
    {
        $IsLeadnameExists = $this->isLeadnameExists($_POST["leadname"]);
        $IsMembernameExists = $this->isMembernameExists($_POST["membername"]);
        $IsLeadEmailExists = $this->isLeadEmailExists($_POST["leademail"]);
        $IsMemberEmailExists = $this->isMemberEmailExists($_POST["memberemail"]);
        $response = array();
        if ($IsLeadEmailExists) {
            $response = array(
                "status" => "error",
                "message" => "Leademail already exists."
            );
        } else if ($IsMemberEmailExists) {
            $response = array(
                "status" => "error",
                "message" => "Memberemail already exists."
            );
        } else if ($IsLeadNameExists) {
            $response = array(
                "status" => "error",
                "message" => "Leadname already exists."
            );
        } else if ($IsMemberNameExists) {
            $response = array(
                "status" => "error",
                "message" => "Membername already exists."
            );
        }else {
            if (! empty($_POST["signup-password"])) {

                // PHP's password_hash is the best choice to use to store passwords
                // do not attempt to do your own encryption, it is not safe
                $hashedPassword = password_hash($_POST["signup-password"], PASSWORD_DEFAULT);
            }
            $query1 = 'INSERT INTO student (leadname, membername, leademail, memberemail, password) VALUES (?, ?, ?, ?, ?)';
            $paramType1 = 'sssss';
            $paramValue1 = array(
                $_POST["leadname"],
                $_POST["membername"],
                $_POST["leademail"],
                $_POST["memberemail"],
                $hashedPassword 
            );
            $query2 = 'INSERT INTO team (leadname, membername, leademail, memberemail) VALUES (?, ?, ?, ?)';
            $paramType2 = 'ssss';
            $paramValue2 = array(
                $_POST["leadname"],
                $_POST["membername"],
                $_POST["leademail"],
                $_POST["memberemail"] 
            );
            $memberId1 = $this->ds->insert($query1, $paramType1, $paramValue1);
            $memberId2 = $this->ds->insert($query2, $paramType2, $paramValue2);
            if (! empty($memberId1)) {
                $response = array(
                    "status" => "success",
                    "message" => "You have registered successfully."
                );
            }
        }
        return $response;
    }

    public function getLead($leademail)
    {
        $query = 'SELECT * FROM student where leademail = ?';
        $paramType = 's';
        $paramValue = array(
            $leademail
        );
        $memberRecord = $this->ds->select($query, $paramType, $paramValue);
        return $memberRecord;
    }

    /**
     * to login a user
     *
     * @return string
     */
    public function loginLead()
    {
        $memberRecord = $this->getLead($_POST["leademail"]);
        $loginPassword = 0;
        if (! empty($memberRecord)) {
            if (! empty($_POST["login-password"])) {
                $password = $_POST["login-password"];
            }
            $hashedPassword = $memberRecord[0]["password"];
            $loginPassword = 0;
            if (password_verify($password, $hashedPassword)) {
                $loginPassword = 1;
            }
        } else {
            $loginPassword = 0;
        }
        if ($loginPassword == 1) {
            // login sucess so store the member's username in
            // the session
            session_start();
            $_SESSION["leademail"] = $memberRecord[0]["leademail"];
            $_SESSION["leadname"] = $memberRecord[0]["leadname"];
            session_write_close();
            $url = "./iPortfolio/home1.php";
            header("Location: $url");
        } else if ($loginPassword == 0) {
            $loginStatus = "Invalid email or password.";
            return $loginStatus;
        }
    }

    public function getMember($memberemail)
    {
        $query = 'SELECT * FROM student where memberemail = ?';
        $paramType = 's';
        $paramValue = array(
            $memberemail
        );
        $memberRecord = $this->ds->select($query, $paramType, $paramValue);
        return $memberRecord;
    }

    /**
     * to login a user
     *
     * @return string
     */
    public function loginMember()
    {
        $memberRecord = $this->getMember($_POST["memberemail"]);
        $loginPassword = 0;
        if (! empty($memberRecord)) {
            if (! empty($_POST["login-password"])) {
                $password = $_POST["login-password"];
            }
            $hashedPassword = $memberRecord[0]["password"];
            $loginPassword = 0;
            if (password_verify($password, $hashedPassword)) {
                $loginPassword = 1;
            }
        } else {
            $loginPassword = 0;
        }
        if ($loginPassword == 1) {
            // login sucess so store the member's username in
            // the session
            session_start();
            $_SESSION["memberemail"] = $memberRecord[0]["memberemail"];
            $_SESSION["membername"] = $memberRecord[0]["membername"];
            session_write_close();
            $url = "./iPortfolio/home2.php";
            header("Location: $url");
        } else if ($loginPassword == 0) {
            $loginStatus = "Invalid email or password.";
            return $loginStatus;
        }
    }
    
}
