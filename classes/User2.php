<?php

require_once "Database.php";

/**
 * All the logic of our app will here / This serves as the brain of our application
 */

 class User extends Database{
  /**
  * Method to insert/store the first_name, last_name, username and password
  * into the database table
  */
  public function store($request){
    $first_name = $request['first_name'];
    $last_name = $request['last_name'];
    $username = $request['username'];
    $password = $request['password'];

    # Hash the password for security
    $password = password_hash($password, PASSWORD_DEFAULT);

    # Query string
    $sql = "INSERT INTO users(`first_name`, `last_name`, `username`, `password`) VALUES('$first_name', '$last_name', '$username', '$password')";

    # Execute the query
    if ($this->conn->query($sql)) {
        header('location: ../views'); //redirect to login page if registration is successful
        exit;
    }else{
        die("Error in creating the user." . $this->conn->error);
    }
  }



  /**
 * Method to use to check the username and password during login
 */

 public function login($request){
    $username = $request['username']; //username recevied coming from the form
    $password = $request['password']; //password recevied coming from the form
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $this->conn->query($sql);

    #check if username exists
    if ($result->num_rows == 1) {//if this is TRUE that num_rows ==1, then meaning the username exists
      #check if password 
      $user = $result->fetch_assoc();
      //$user = ['id => 1, 'username' => 'mary.watson', 'password' => '$77&~%_**7)=' ...]

      #conpare the password if it is the same in the database
      if(password_verify($password, $user['password'])){
        # initialize session variables
        session_start();
        $_SESSION['id'] = $user['id']; // id:1
        $_SESSION['username'] = $user['username']; // username: mary.watson
        $_SESSION['full_name'] = $user['full_name'] . " " . $user['last_name']; // Mary Watson

        header('location: ../views/dashbord.php'); //redirect the user to dashbord
        exit;
      }
      else{
        die('password is incorrect');
      }
    }
    else{
      die('user is incorrect');
    }
 }

   
  /**
   * Get all the users
   */
  public function getAllUsers(){
    $sql = "SELECT id, first_name, last_name, username, photo FROM users";
    if($result = $this->conn->query($sql)){
      return $result;
    }
    else{
      die("Error retrieving all users." .$this->conn->error);
    }

  }

  /**
   * Method to retrieve specific user
   * 
   * # Homework:Create the method that retrieved the details of the currently logged-in user
   * 現在ログインしているユーザーの詳細を取得するメソッドを作成します
   */
  public function getUserDetail(){
    // $sql = "SELECT * WHERE '$_SESSION['username']' FROM users";
    $sql = "SELECT * FROM users WHERE username = 'mary'";
    if($result = $this->conn->query($sql)){
      return $result;
    }
    else{
      die("Error retrieving all users." .$this->conn->error);
    }

  }






}