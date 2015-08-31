<?php
require_once "tablemanager.php";
$manager = new TableManager("byakko","byakko");

?>
<!--
@license
Copyright (c) 2015 The Polymer Project Authors. All rights reserved.
This code may only be used under the BSD style license found at http://polymer.github.io/LICENSE.txt
The complete set of authors may be found at http://polymer.github.io/AUTHORS.txt
The complete set of contributors may be found at http://polymer.github.io/CONTRIBUTORS.txt
Code distributed by Google as part of the polymer project is also
subject to an additional IP rights grant found at http://polymer.github.io/PATENTS.txt
-->

<!doctype html>
<html lang="">

<head>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="generator" content="Polymer Starter Kit" />
  <title>Control Panel</title>
  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

  <!-- Chrome for Android theme color -->
  <meta name="theme-color" content="#303F9F">

  <!-- Web Application Manifest -->
  <link rel="manifest" href="manifest.json">

  <!-- Chrome for Android Theme color -->
  <meta name="msapplication-TileColor" content="#3372DF">

  <!-- Add to homescreen for Chrome on Android -->
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="application-name" content="Polymer Starter Kit">
  <link rel="icon" sizes="192x192" href="images/touch/chrome-touch-icon-192x192.png">

  <!-- Add to homescreen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Polymer Starter Kit">
  <link rel="apple-touch-icon" href="images/touch/apple-touch-icon.png">
  <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Tile icon for Win8 (144x144 + tile color) -->
  <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">

  <!-- build:css styles/main.css -->
  <link rel="stylesheet" href="styles/main.css">
  <!-- endbuild-->

  <!-- build:js bower_components/webcomponentsjs/webcomponents.min.js -->
  <script src="bower_components/webcomponentsjs/webcomponents-lite.js"></script>
  <!-- endbuild -->

  <!-- will be replaced with elements/elements.vulcanized.html -->
  <link rel="import" href="elements/elements.html">
  <!-- endreplace-->

  <style type="text/css">
        
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.5/js/bootstrap-select.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    
    <?php
    $manager->selectdb("byakko");
    $get_job = $manager->get_table_data("job");
    for($i=0;$i<count($get_job);$i++){
      echo "function addA".(string)$i."()";
      echo "{document.getElementById(\"addAgent".(string)$i."\")"."."."style"."."."display"."="."\"block\"".";"."}";
    }

    for($i=0;$i<count($get_job);$i++){
      echo "function deleteA".(string)$i."()";
      echo "{document.getElementById(\"deleteAgent".(string)$i."\")"."."."style"."."."display"."="."\"block\"".";"."}";
    }

    for($i=0;$i<count($get_job);$i++){
      echo "function editT".(string)$i."()";
      echo "{document.getElementById(\"selectedit".(string)$i."\")"."."."style"."."."display"."="."\"block\"".";"."}";
    }



    ?>


    </script>
</head>

<body unresolved class="fullbleed layout vertical">
  <template is="dom-bind" id="app">

    <paper-drawer-panel id="paperDrawerPanel" forceNarrow>
      <div drawer>

        <!-- Drawer Toolbar -->
        <paper-toolbar id="drawerToolbar">
          <span>Admin Menu</span>
        </paper-toolbar>

        <!-- Drawer Content -->
          <paper-menu class="list" attr-for-selected="data-route" selected="{{route}}">
              <a data-route="home">
                <iron-icon icon="assessment"></iron-icon>
                <span>Agent Assignment</span>
              </a>

              <a data-route="users" >
                <iron-icon icon="perm-identity"></iron-icon>
                <span>Edit Agents</span>
              </a>

              <a data-route="contact">
                <iron-icon icon="speaker-notes"></iron-icon>
                <span>Edit Topics</span>
              </a>
          </paper-menu>
      </div>
      <paper-header-panel main mode="waterfall-tall">
        <!-- Main Toolbar -->
        <paper-toolbar id="mainToolbar">
          <button tabindex="1" id="paperToggle" paper-drawer-toggle>
            <iron-icon icon="menu" paper-drawer-toggle></iron-icon>
          </button>
          <span class="flex"></span>

          <!-- Toolbar icons -->
          <paper-icon-button icon="refresh"></paper-icon-button>
          <paper-icon-button icon="search"></paper-icon-button>
          <div class="middle"></div>

          <!-- Application name -->
          <div class="appname bottom paper-font-display2">Control Panel : Transcription Service</div>

        </paper-toolbar>

        <!-- Main Content -->
       


          <iron-pages attr-for-selected="data-route" selected="{{route}}">
          <section data-route="tc/polylight">
              <paper-material elevation="1">
                <h2 class="paper-font-display2">TESTTTT</h2>
                <p>ByakkoHD</p>
              </paper-material>
            </section>


            <section data-route="home">
              <paper-material elevation="1">
                
              </paper-material>

              <?php
                $manager->selectdb("byakko");

                  $getagent = $manager->get_table_data("Agent");
                  $inac=array();
                  $row=count($getagent);
                  for($i=0;$i<$row;$i++){
                    if($getagent[$i][3]=="inactive"){
                      array_push($inac,$getagent[$i][1]);
                    }
                  }
                  $topics = array();
                  $topic = array();
                  $us = array();
                  $getjob = $manager->get_table_data("job");
                  $jrow = count($getjob);
                  for($i=0;$i<$jrow;$i++){
                    array_push($topics, $getjob[$i][1]." / ".$getjob[$i][2]);
                    array_push($topic, $getjob[$i][2]);
                    array_push($us, $getjob[$i][1]);
                  }

                for($i=0;$i<count($inac);$i++){
                  echo "<paper-material elevation=\"1\">";
                  echo "<form action=\"subsup.php\" method=\"post\">";
                  echo "<h2 class=\"paper-font-display2\"> Agent : ".$inac[$i]."</h2>";
                  echo "<p>Assign to : </p>";
                  echo "<select name=\"selected\" >";
                    for($j=0;$j<$jrow;$j++){
                      echo "<option value=\"".$topics[$j]."\">".$topics[$j]."</option>";
                    }
                    echo "</select>";
                  echo "<input type=\"hidden\" name=\"agent\" value=\"".$inac[$i]."\">";
                  echo "<button type=\"submit\" class=\"btn btn-info\" id=\"".(string)$i."\">Add</button>";
                  echo "</form>";
                  echo "</paper-material>";
                }
              ?>


            </section>

            <section data-route="users">
            <?php
              $manager->selectdb("byakko");

              $getjob = $manager->get_table_data("job");
              $topic=array();
              $agent=array();
              $id=array();
              $row=count($getjob);
            ?>
              <?php
                for($i=0;$i<$row;$i++){
                  array_push($topic,$getjob[$i][2]);
                  array_push($agent,$getjob[$i][6]);
                  array_push($id,$getjob[$i][0]);
                  echo "<paper-material elevation=\"1\">";
                  echo "<h2 class=\"paper-font-display2\">".$topic[$i]."</h2>";
                  echo "<p>Agent(s) : ".$agent[$i]."</p>";
                  echo "<input type=\"hidden\" name=\"id\" value=\"".$id[$i]."\">";
                  echo "<input type=\"hidden\" name=\"topic\" value=\"".$topic[$i]."\">";
                  echo "<input type=\"hidden\" name=\"agent\" value=\"".$agent[$i]."\">";
                  echo "<button type=\"button\" class=\"btn btn-info\"  onclick=\"addA".(string)$i."()\">Add</button>";
                  echo " ";
                  echo "<button type=\"button\" class=\"btn btn-warning\"  onclick=\"deleteA".(string)$i."()\">Delete</button>";
                  echo "<div id=\"addAgent".(string)$i."\" style = \"display:none;\">";
                  echo "<form method=\"post\" action=\"update_add.php\">";
                  $getagent_add = $manager->get_table_data("Agent");
                  $inacAdd=array();
                  $rowAdd=count($getagent_add);
                  for($j=0;$j<$rowAdd;$j++){
                    if($getagent_add[$j][3]=="inactive"){
                      array_push($inacAdd,$getagent_add[$j][1]);
                    }

                  }
                  echo "<select name=\"addagent\" >";
                  for($j=0;$j<count($inacAdd);$j++){
                    echo "<option value=\"".$inacAdd[$j]."\">".$inacAdd[$j]."</option>";
                  }

                  echo "</select>";
                  echo "<input type=\"hidden\" name=\"id\" value=\"".$id[$i]."\">";
                  echo "<input type=\"hidden\" name=\"topic\" value=\"".$topic[$i]."\">";
                  echo "<input type=\"submit\">";
                  echo "</form>";
                  echo "</div>";

                  echo "<div id=\"deleteAgent".(string)$i."\"style = \"display:none;\">";
                  echo "<form method =\"post\" action=\"update_delete.php\">";
                  $s_agent=explode(",",$agent[$i]);
                  echo "<select name=\"deleteagent\" >";
                  for($j=0;$j<count($s_agent);$j++){
                    echo "<option value=\"".$s_agent[$j]."\">".$s_agent[$j]."</option>";
                  }
                  echo "</select>";
                  echo "<input type=\"hidden\" name=\"id\" value=\"".$id[$i]."\">";
                  echo "<input type=\"hidden\" name=\"topic\" value=\"".$topic[$i]."\">";
                  echo "<input type=\"submit\">";
                  echo "</form>";
                  echo "</div>";

                  echo "</paper-material>";
                }
              ?>
            </section>

            <section data-route="contact">

            <?php
              $manager->selectdb("byakko");
              $getjob = $manager->get_table_data("job");
              $id=array();
              $user=array();
              $topic=array();
              $timestart=array();
              $timeend=array();
              $datestart=array();
              for($i=0;$i<count($getjob);$i++){
                array_push($id,$getjob[$i][0]);
                array_push($user,$getjob[$i][1]);
                array_push($topic,$getjob[$i][2]);
                array_push($timestart,$getjob[$i][3]);
                array_push($timeend,$getjob[$i][4]);
                array_push($datestart,$getjob[$i][5]);
                echo "<paper-material elevation=\"1\">";
                echo "<h2 class=\"paper-font-display2\">".$topic[$i]."</h2>";
                echo "<p>By : ".$user[$i]."</p>"."<br>";
                echo "<p>Time Start : ".$timestart[$i]."</p>"."<br>";
                echo "<p>Time End : ".$timeend[$i]."</p>"."<br>";
                echo "<p>Date : ".$datestart[$i]."</p>"."<br>";

                //echo "<input type=\"hidden\" name=\"id\" value=\"".$id[$i]."\">";
                echo "<form method = \"post\">";
                echo "<input type=\"hidden\" name=\"topic\" value=\"".$topic[$i]."\">";
                echo "<button type=\"button\" class=\"btn btn-info\"  onclick=\"editT".(string)$i."()\">Edit</button>";
                //echo "<form method = \"post\">";
                echo "<input type=\"hidden\" name=\"id\" value=\"".$id[$i]."\">";
                echo " ";
                echo "<button type=\"button\" class=\"btn btn-warning\"  onclick=\"javascript:this.form.action='deletetopic.php';this.form.submit()\">Delete Topic</button>";
                echo "</form>"; 

                echo "<div id=\"selectedit".(string)$i."\"style = \"display:none;\">";
                echo "<form method =\"post\" action=\"update_edit.php\">";
                echo "<select name=\"selectedit\" >";
                echo "<option value=\"1\">edit topic</option>";
                echo "<option value=\"2\">edit timestart</option>";
                echo "<option value=\"3\">edit timeend</option>";
                echo "<option value=\"4\">edit datestart</option>";
                echo "</select>";
                echo "<input type=\"hidden\" name=\"id\" value=\"".$id[$i]."\">";
                echo "<input type=\"hidden\" name=\"topic\" value=\"".$topic[$i]."\">";
                echo "<input type=\"text\" name=\"edit\">";
                echo "<input type=\"submit\">";
                echo "</form>";
                echo "</div>";




                echo "</paper-material>";
              }
            ?>
             
            </section>

          

          </iron-pages>
            
            

          </paper-header-panel>
    </paper-drawer-panel>

  </template>

  <!-- build:js scripts/app.js -->
  <script src="scripts/app.js"></script>
  <!-- endbuild-->
</body>

</html>
