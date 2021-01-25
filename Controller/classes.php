<?php
    class Users {
        // Properties
        // public $name;
        // public $color;
        public $username;
        public $user_email;
        public $passwd;
        public $confPasswd;

        /*Constructor*/
        function __construct($username, $user_email, $passwd, $confPasswd) {
            $this->username = $username;
            $this->user_email = $user_email;
            $this->passwd = $passwd;
            $this->confPasswd = $confPasswd;
        }
      
        /*Setters*/
        // Methods
        function set_username($username) {
            $this->username = $username;
        }

        function set_user_email($user_email) {
            $this->user_email = $user_email;
        }

        function set_passwd($passwd) {
            $this->passwd = $passwd;
        }

        function set_confPasswd($confPasswd) {
            $this->confPasswd = $confPasswd;
        }

        function set_newUser($username, $user_email, $passwd, $confPasswd) {
            $this->username = $username;
            $this->user_email = $user_email;
            $this->passwd = $passwd;
            $this->confPasswd = $confPasswd;
        }

        function get_username() {
            return $this->username;
        }

        function get_user_email() {
            return $this->user_email;
        }

        function get_passwd() {
            return $this->passwd;
        }

        function get_confPasswd() {
            return $this->confPasswd;
        }
        
        function get_newUser() {
            $user_data[] = $this->username;
            $user_data[] = $this->user_email;
            $user_data[] = $this->passwd;
            $user_data[] = $this->confPasswd;
            return $user_data;
        }
      }
?>