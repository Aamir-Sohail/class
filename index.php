<?php include_once 'config/init.php';

$job = new course;

$template = new Template('template/frontpage.php');

$assigment = isset($_GET['assigment']) ? $_GET['assigment'] : null;

if (isset($CourseID)) {
    $template->title = 'assigment in ' .$job->getAssigment($CourseID)->name;
    $template->assigment= $CourseID->getBycourses($CourseID);
} else {
    $template->title = 'Latest Assigment';
    if(isset($CourseID)){
    $template->courses = $CourseID->getAllcourses();
    }
}
if (isset($CourseID)) {
  

$template->categories = $CourseID->getBycourses('');
}
echo $template;