<?php 

session_start();
error_reporting(0);


try {
    $conn = mysqli_connect('localhost','root','Panda@2001','bloodbank',3306);
    // print("sucessfully connceted");



    $query ="CREATE TABLE  IF NOT EXISTS `bloodbank`.`user` (
        `iduser` INT NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(45) NOT NULL,
        `email` VARCHAR(60) NOT NULL,
        `password` VARCHAR(45) NOT NULL,
        `blood` INT NOT NULL,
        PRIMARY KEY (`iduser`),
        UNIQUE INDEX `iduser_UNIQUE` (`iduser` ASC) VISIBLE);";

    $res =mysqli_query($conn,$query);


        $medTable =
     " CREATE TABLE IF NOT EXISTS `bloodbank`.`hospital` (
      `idhospital` INT NOT NULL AUTO_INCREMENT,
      `hname` VARCHAR(45) NOT NULL,
      `address` VARCHAR(45) NOT NULL,
      `hemail` VARCHAR(45) NOT NULL,
      `hpassword` VARCHAR(45) NOT NULL,
      PRIMARY KEY (`idhospital`),
      UNIQUE INDEX `idhospital_UNIQUE` (`idhospital` ASC) VISIBLE);";

$res2 =mysqli_query($conn,$medTable);



    $bloodTableQuery="CREATE TABLE IF NOT EXISTS `blood`(
        `idBlood` INT NOT NULL AUTO_INCREMENT,
        `group` VARCHAR(20) NOT NULL ,
        PRIMARY KEY (`idBlood`)



    );";

$res2 =mysqli_query($conn,$bloodTableQuery);


    $requestTable ="CREATE TABLE IF NOT EXISTS `bloodbank`.`bloodrequest` (
        `idRequest` INT NOT NULL AUTO_INCREMENT,
        `Bid` INT NOT NULL,
        `Mid` INT NOT NULL,
        `Uid` INT NOT NULL,
        `unit` INT NOT NULL,
        `time` DATETIME  NULL,
        `status` INT NULL,
        PRIMARY KEY (`idRequest`));
      ";


$res3 =mysqli_query($conn,$requestTable);


$blood_present="CREATE TABLE IF NOT EXISTS `bloodbank`.`blood_present` (
    `idP` INT NOT NULL AUTO_INCREMENT,
    `bid` INT NULL,
    `mid` INT NULL,
    `count` INT NULL,
    PRIMARY KEY(`idP`)

    );";

$res4=mysqli_query($conn,$blood_present);


} catch (mysqli_sql_exception $th) {
    
    print($th);
}







// $query="INSERT INTO `bloodbank`.`blood` (`idBlood`, `group`) VALUES ('1', 'A+');
// INSERT INTO `bloodbank`.`blood` (`idBlood`, `group`) VALUES ('2', 'A-');
// INSERT INTO `bloodbank`.`blood` (`idBlood`, `group`) VALUES ('3', 'B+');
// INSERT INTO `bloodbank`.`blood` (`idBlood`, `group`) VALUES ('4', 'B-');
// INSERT INTO `bloodbank`.`blood` (`idBlood`, `group`) VALUES ('5', 'AB+');
// INSERT INTO `bloodbank`.`blood` (`idBlood`, `group`) VALUES ('6', 'AB-');
// INSERT INTO `bloodbank`.`blood` (`idBlood`, `group`) VALUES ('7', 'O+');
// INSERT INTO `bloodbank`.`blood` (`idBlood`, `group`) VALUES ('8', 'O-');
// ";

// $res5= mysqli_multi_query($conn,$query);







?>