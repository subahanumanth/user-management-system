<?php
include ("autoload.php");
$url = $_GET['url'];
$url = explode('/', $url);
$adminList = adminList::getInstance();
if(isset($url[3]) and $url[3] == "sortByName") {
    $list = $adminList->sortByName($_SESSION['id']);
    for ($i = 0;$i < count($list);$i++)
    {
        $list[$i]['bloodGroup'] = $adminList->showAllBloodGroup($list[$i]['id']);
        $list[$i]['detailsOfGraduation'] = $adminList->showAllDetailsOfGraduation($list[$i]['id']);
        $list[$i]['areaOfInterest'] = $adminList->showAllAreaOfInterest($list[$i]['id']);
        $list[$i]['email'] = $adminList->showAllEmail($list[$i]['id']);
        $list[$i]['mobile'] = $adminList->showAllMobile($list[$i]['id']);
    }
} else if(isset($url[3]) and $url[3] == "sortByGender") {
    $list = $adminList->sortByGender($_SESSION['id']);
    for ($i = 0;$i < count($list);$i++)
    {
        $list[$i]['bloodGroup'] = $adminList->showAllBloodGroup($list[$i]['id']);
        $list[$i]['detailsOfGraduation'] = $adminList->showAllDetailsOfGraduation($list[$i]['id']);
        $list[$i]['areaOfInterest'] = $adminList->showAllAreaOfInterest($list[$i]['id']);
        $list[$i]['email'] = $adminList->showAllEmail($list[$i]['id']);
        $list[$i]['mobile'] = $adminList->showAllMobile($list[$i]['id']);
    }
} else if(isset($url[3]) and $url[3] == "sortBydate") {
    $list = $adminList->sortByGender($_SESSION['id']);
    for ($i = 0;$i < count($list);$i++)
    {
        $list[$i]['bloodGroup'] = $adminList->showAllBloodGroup($list[$i]['id']);
        $list[$i]['detailsOfGraduation'] = $adminList->showAllDetailsOfGraduation($list[$i]['id']);
        $list[$i]['areaOfInterest'] = $adminList->showAllAreaOfInterest($list[$i]['id']);
        $list[$i]['email'] = $adminList->showAllEmail($list[$i]['id']);
        $list[$i]['mobile'] = $adminList->showAllMobile($list[$i]['id']);
    }
} else {
    $list = $adminList->showAllDetail($_SESSION['id']);
    for ($i = 0;$i < count($list);$i++)
    {
        $list[$i]['bloodGroup'] = $adminList->showAllBloodGroup($list[$i]['id']);
        $list[$i]['detailsOfGraduation'] = $adminList->showAllDetailsOfGraduation($list[$i]['id']);
        $list[$i]['areaOfInterest'] = $adminList->showAllAreaOfInterest($list[$i]['id']);
        $list[$i]['email'] = $adminList->showAllEmail($list[$i]['id']);
        $list[$i]['mobile'] = $adminList->showAllMobile($list[$i]['id']);
    }
}
$_SESSION['fullName'] = $adminList->selectName($_SESSION['id']);
if ($url[1] == "delete" and isset($url[2]))
{
    $id = $url[2];
    $adminList->deleteEmail($id);
    $adminList->deleteMobile($id);
    $adminList->deleteAreaOfInterest($id);
    $adminList->deleteDetail($id);	
    header("Location:../../../list/1");
}
if ($url[1] == "update" and isset($url[2]))
{
    header("Location:../../new/$url[2]");
}
if(isset($url[1]) and isset($url[2]) and is_numeric($url[1])) {
    $records = $url[2];
    $to = $url[1] * $records;
    $from = ($url[1] * $records) - $records;
} else {
    $records = 5;
    if(isset($url[1]) and is_numeric($url[1])) {
        $to = $url[1] * $records;
        $from = ($url[1] * $records) - $records;
        $pages = ceil(count($list) / 5);
    }
}
include_once("./view/adminList.php");
?>
