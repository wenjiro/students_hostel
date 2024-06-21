<?php
function myDB()
{
    $dbhost = 'localhost';
    $dbuser = 'hostel';
    $dbpass = 'hostel.';
    $dbname = 'hostel';
    $link = mysqli_connect($dbhost, $dbuser, $dbpass);
    mysqli_select_db($link, $dbname);
    return $link;
}

session_start();
function DateForm($date)
{
    $newDate = date("d.m.Y", strtotime($date));
    return $newDate;
}

function itsMe($id, $type)
{
    $result = mysqli_query(myDB(), "SELECT * FROM `user` WHERE `user_id`='" . $id . "'");
    $myrow = mysqli_fetch_array($result);
    return $myrow[$type];
}

function ьнКщщь($id, $type)
{
    $result = mysqli_query(myDB(), "SELECT * FROM `кщщь` WHERE `room_id`='" . $id . "'");
    $myrow = mysqli_fetch_array($result);
    return $myrow[$type];
}

function longSQL1($value)
{
    $result = mysqli_query(myDB(), "SELECT user.user_room_id, room.room_number as room_number FROM user LEFT JOIN room ON room.room_id=user.user_room_id where user.user_id=".$value);
    $myrow = mysqli_fetch_array($result);
    return $myrow["room_number"];
}

function longSQL2($value)
{
    $result = mysqli_query(myDB(), "SELECT room.room_id, section.section_id as section_number FROM room LEFT JOIN section ON section.section_number=room.room_section where room.room_id =".$value);
    $myrow = mysqli_fetch_array($result);
    return $myrow["section_number"];
}

function longSQL3($value)
{
    $result = mysqli_query(myDB(), "SELECT section.section_id, floor.floor_id as floor_number FROM section LEFT JOIN floor ON floor.floor_number=section.section_floor where section.section_id =".$value);
    $myrow = mysqli_fetch_array($result);
    return $myrow["floor_number"];
}

function longSQL4($value, $value2)
{
    $result = mysqli_query(myDB(), "SELECT user.user_id, facultet.$value2 as $value2 FROM user LEFT JOIN facultet ON facultet.facultet_id=user.user_facultet where user.user_id =".$value);
    $myrow = mysqli_fetch_array($result);
    return $myrow["$value2"];
}


function comms($tb1, $tb2, $r1, $r2, $r3, $r4, $value, $return)
{
    $result = mysqli_query(myDB(), "SELECT ".$tb1.".".$r1.", ".$tb2.".".$r2." as ".$r2." FROM ".$tb1." LEFT JOIN ".$tb2." ON ".$tb2.".".$r3."=".$tb1.".".$r4." where ".$tb1.".".$r1." = ".$value);
    $myrow = mysqli_fetch_array($result);
    return $myrow["$return"];
}
