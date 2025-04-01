<?php
if (!isset($_SESSION)) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<title>Ride With Us</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">

<!-- Le styles -->
<link href="/css/lib/bootstrap.css" rel="stylesheet">
<link href="/css/lib/bootstrap-responsive.css" rel="stylesheet">
<link href="/css/lib/bootstrap-docs.css" rel="stylesheet">
<link href="/css/common/stylesheet.css" rel="stylesheet">
<!-- Le javascript
  ================================================== -->
<script src="/js/lib/jquery.min.js"></script>
<script src="/js/lib/bootstrap.js"></script>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>

<body data-spy="scroll" data-target=".bs-docs-sidebar">
  <?php
  include_once 'navbar.php';
  ?>