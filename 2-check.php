<?php
// (A) START SESSION
session_start();

// (B) PROCESS LOGIN
if (isset($_POST["user"]) && !isset($_SESSION["user"])) {
  // (B1) USERS & PASSWORDS - SET YOUR OWN !
  $users = [
    "usuario1" => "a23456",
    "usuario2" => "b23456",
    "usuario3" => "c23456"
  ];

  // (B2) CHECK & VERIFY
  if (isset($users[$_POST["user"]]) && $users[$_POST["user"]] == $_POST["password"]) {
    $_SESSION["user"] = $_POST["user"];
  }

  // (B3) FAILED LOGIN FLAG
  if (!isset($_SESSION["user"])) { $failed = true; }
}

// (C) REDIRECT TO HOME PAGE IF SIGNED IN - SET YOUR OWN !
if (isset($_SESSION["user"])) {
  header("Location: 4-showUser.php");
  exit();
}