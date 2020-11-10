<?php
include ("autoload.php");
include ("./model/table.php");
include ("./model/tableAdapter.php");

$url = $_GET['url'];
$url = explode('/', $url);
if ($url[1] == "delete" and isset($url[2]))
{
    $table->delete($url[2], "details_of_graduation");
    header("Location:../../manageDetailsOfGraduation");
}
if ($url[1] == "add" and isset($_POST['submit']))
{
    $bg = $_POST['bg'];
    $table->save($bg, "details_of_graduation", "details_of_graduation");
    header("Location:../manageDetailsOfGraduation");
}
if (isset($url[2]))
{
    $value = $table->find($url[2], "details_of_graduation", "details_of_graduation");
}
if (isset($_POST['submit']) and $url[1] == "update" and isset($url[2]))
{
    $table->update($url[2], $_POST['bg'], "details_of_graduation", "details_of_graduation");
    header("Location:../../manageDetailsOfGraduation");
}
$list = $table->get("details_of_graduation", "details_of_graduation", "detailsOfGraduation");
session_start();
if (isset($_SESSION['name']))
{
    include ("./view/detailsOfGraduation.php");
}
else
{
    header("Location:login");
}
?>
