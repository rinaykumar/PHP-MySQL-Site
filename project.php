<!DOCTYPE html>
<html lang = "en-US">
  <head>
  <meta charset = "UTF-8">
  <title>CSC 675 Project</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
  </head>
  <script>
    function tablesFunc() {
      var x = document.getElementById("tables");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }
    function queriesFunc() {
      var x = document.getElementById("queries");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }
  </script>
  <style>
    pre {
      color: #ff4d88;
    }

    #page-container {
      position: relative;
      min-height: 100vh;
    }
</style>
  <body>
    <p>
      <?php
        try {
          // Server credentials
          $servername = "wanderdb.c4p7z07xl4sc.us-east-1.rds.amazonaws.com";
          $username = "root";
          $password = "awesomeganbold";

          // Connect to server
          $con = new PDO("mysql:host=$servername;dbname=CarDealerShip", $username, $password);
          $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
          // Header Title
          print "<div class='container'>";
          print "<center><h1 style='font-family: Lato'>CSC 675 Project</h1></center>";
          print "<center><p class='text-muted'>
                Rinay Kumar  |  
                Gangzhaorige Li  |  
                Tianchen Liu  |  
                Nina Mir
                </p>
                </center>";
          print "<hr/>";
          
          // Start main div
          print "<div id='page-container'>";
          print "<div id='content-wrap'>";
          print "<div class='container'>";
          
          ///////// Search Bar /////////
          print "<h4>Search Database</h4><br/>";

          // Search bar
          print "<p>Enter SQL query:</p>";
          print "<form action=# method='post'>
                <input class='form-control' type='text' placeholder='Example: SELECT * FROM Autogroup;' autofocus name='search'>
                </form>";
                   
          // Saves search entry to variable
          $searchValue = isset($_POST['search']) ? $_POST['search'] : '';

          // If searchValue is empty, example instead
          if ($searchValue == '') {
            $searchValue = "SELECT * FROM Autogroup";
          }

          print "<br/><p>Result: </p>";

          // Gets the column names
          $result = $con->query($searchValue);
          print "<table class='table table-bordered'>";
    
          // Returns field names
          $row = $result->fetch(PDO::FETCH_ASSOC);
          print " <tr>";

          // Loop to print field names
          foreach ($row as $field => $value){
            print " <th>$field</th>";
          }
          print " </tr>";

          // Gets the data
          $data = $con->query($searchValue);
          $data->setFetchMode(PDO::FETCH_ASSOC);
          
          // Loop to print data values
          foreach($data as $row){
            print " <tr>";
              foreach ($row as $name=>$value){
                print " <td>$value</td>";
              }
            print " </tr>";
          } 
          print "</table>";
        } catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
        }
          print "</div>"; // End main div
          print "<div class='container'>"; // Second main div
          print "<br/><hr/>";
          
          // Tables
          print "<button type='button' class='btn btn-light' onclick='tablesFunc()'><h4>Tables</h4></button>";

          //////// Autogroup Table Data /////////
          print "<div id='tables' style='display:none'>";
          
          $query = "SELECT * FROM Autogroup";
          print "<br/><h5>AutoGroup</h5>";
          
          // Gets the column names
          print "<table class='table table-bordered'>";
          $result = $con->query($query);
    
          // Returns field names
          $row = $result->fetch(PDO::FETCH_ASSOC);
          print " <tr>";

          // Loop to print field names
          foreach ($row as $field => $value){
            print " <th>$field</th>";
          }
          print " </tr>";

          // Gets the data
          $data = $con->query($query);
          $data->setFetchMode(PDO::FETCH_ASSOC);
          
          // Loop to print data values
          foreach($data as $row){
            print " <tr>";
              foreach ($row as $name=>$value){
                print " <td>$value</td>";
              }
            print " </tr>";
          } 
          print "</table>";
          print "<br/>";
          
          //////// Dealership Table Data /////////
          $query = "SELECT * FROM Dealership";
          print "<h5>Dealership</h5>";
          
          // Gets the column names
          print "<table class='table table-bordered'>";
          $result = $con->query($query);
          
          // Returns field names
          $row = $result->fetch(PDO::FETCH_ASSOC);
          print " <tr>";

          // Loop to print field names
          foreach ($row as $field => $value){
            print " <th>$field</th>";
          }
          print " </tr>";

          // Gets the data
          $data = $con->query($query);
          $data->setFetchMode(PDO::FETCH_ASSOC);
          
          // Loop to print data values
          foreach($data as $row){
            print " <tr>";
              foreach ($row as $name=>$value){
                print " <td>$value</td>";
              }
            print " </tr>";
          } 
          print "</table>";
          print "<br/>";

          //////// Car Table Data /////////
          $query = "SELECT * FROM Car";
          print "<h5>Car</h5>";
          
          // Gets the column names
          print "<table class='table table-bordered'>";
          $result = $con->query($query);
          
          // Returns field names
          $row = $result->fetch(PDO::FETCH_ASSOC);
          print " <tr>";

          // Loop to print field names
          foreach ($row as $field => $value){
            print " <th>$field</th>";
          }
          print " </tr>";

          // Gets the data
          $data = $con->query($query);
          $data->setFetchMode(PDO::FETCH_ASSOC);
          
          // Loop to print data values
          foreach($data as $row){
            print " <tr>";
              foreach ($row as $name=>$value){
                print " <td>$value</td>";
              }
            print " </tr>";
          } 
          print "</table>";
          print "<br/>";

          //////// Customer Table Data /////////
          $query = "SELECT * FROM Customer";
          print "<h5>Customer</h5>";
          
          // Gets the column names
          print "<table class='table table-bordered'>";
          $result = $con->query($query);
          
          // Returns field names
          $row = $result->fetch(PDO::FETCH_ASSOC);
          print " <tr>";

          // Loop to print field names
          foreach ($row as $field => $value){
            print " <th>$field</th>";
          }
          print " </tr>";

          // Gets the data
          $data = $con->query($query);
          $data->setFetchMode(PDO::FETCH_ASSOC);
          
          // Loop to print data values
          foreach($data as $row){
            print " <tr>";
              foreach ($row as $name=>$value){
                print " <td>$value</td>";
              }
            print " </tr>";
          } 
          print "</table>";
          print "<br/>";

          // View table
          $query = "SELECT * FROM VIEW_What_Dealerships_Sold_Cars_to_Which_Customers;";
          print "<h5>VIEW What Dealerships Sold Cars To Which Customers</h5>";
          
          // Gets the column names
          print "<table class='table table-bordered'>";
          $result = $con->query($query);
    
          // Returns field names
          $row = $result->fetch(PDO::FETCH_ASSOC);
          print " <tr>";

          // Loop to print field names
          foreach ($row as $field => $value){
            print " <th>$field</th>";
          }
          print " </tr>";

          // Gets the data
          $data = $con->query($query);
          $data->setFetchMode(PDO::FETCH_ASSOC);
          
          // Loop to print data values
          foreach($data as $row){
            print " <tr>";
              foreach ($row as $name=>$value){
                print " <td>$value</td>";
              }
            print " </tr>";
          } 
          print "</table>";
          print "</br>";
          print "</div>"; // Tables div

          //////// SQL Quereies /////////
          print "<hr/>";
          print "<button type='button' class='btn btn-light' onclick='queriesFunc()'><h4>SQL Queries</h4></button>";
          print "<br/>";
          print "<div id='queries' style='display:none'>";
          print "<br/>";
          // Table queries
          print "<p>Table Queries:</p>
                <pre><code>CREATE TABLE Autogroup ( 
                  gid INT NOT NULL AUTO_INCREMENT,
                  name varchar(30) NOT NULL,
                  hqaddress varchar(50) NOT NULL,
                  owner varchar(30) NOT NULL,
                  PRIMARY KEY (gid)
                );</code></pre></br>
                <pre><code>CREATE TABLE Dealership (
                did INT NOT NULL AUTO_INCREMENT,
                name varchar(30) NOT NULL,
                address varchar(50) NOT NULL,
                phone varchar(15) NOT NULL,
                gid INT NOT NULL,
                PRIMARY KEY (did)
                );</code></pre></br>
                <pre><code>CREATE TABLE Car (
                vin varchar(20) NOT NULL,
                make varchar(30) NOT NULL,
                model varchar(30) NOT NULL,
                year INT NOT NULL,
                price INT(30) NOT NULL,
                did INT NOT NULL,
                ssn varchar(15) NOT NULL,
                PRIMARY KEY (vin)
                );</code></pre></br>
                <pre><code>CREATE TABLE Customer (
                  ssn varchar(15) NOT NULL AUTO_INCREMENT,
                  name varchar(30) NOT NULL,
                  phone varchar(15) NOT NULL,
                  address varchar(50) NOT NULL,
                  email varchar(30) NOT NULL,
                  PRIMARY KEY (ssn)
              );</code></pre></br>
              <pre><code>ALTER TABLE Dealership ADD CONSTRAINT Dealership_fk0 FOREIGN KEY (gid) REFERENCES Autogroup(gid);</code></pre></br>
              <pre><code>ALTER TABLE Car ADD CONSTRAINT Car_fk0 FOREIGN KEY (did) REFERENCES Dealership(did);</code></pre></br>
              <pre><code>ALTER TABLE Car ADD CONSTRAINT Car_fk1 FOREIGN KEY (ssn) REFERENCES Customer(ssn);</code></pre></br>";
     
          
          // Index queries
          print "<p>Index Queries:</p>";
          print "<pre><code>CREATE INDEX customers_address
          ON Customer(ssn, name);</code></pre></br>";
          print "<pre><code>CREATE INDEX car_colors
          ON Car(color, make);</code></pre></br>";

          // View query
          print "<p>View Query</p>";
          print "<pre><code>CREATE VIEW VIEW_What_Dealerships_Sold_Cars_to_Which_Customers
          AS SELECT DISTINCT D.did, CC.name  
          FROM Car C, Dealership D, Customer CC
          WHERE C.ssn = CC.ssn AND D.did = C.did ;
          </code></pre>";

          
          // Query 1
          print "<p>Query 1:</p>
          <pre><code>SELECT C.make, count(*) 
          FROM Car C
          GROUP BY C.make;</code></pre>";
          print "<p>Result:</p>";
          
          $query = "SELECT C.make, count(*) 
          FROM Car C
          GROUP BY C.make;";
          
          // Gets the column names
          print "<table class='table table-bordered'>";
          $result = $con->query($query);
          
          // Returns field names
          $row = $result->fetch(PDO::FETCH_ASSOC);
          print " <tr>";

          // Loop to print field names
          foreach ($row as $field => $value){
            print " <th>$field</th>";
          }
          print " </tr>";

          // Gets the data
          $data = $con->query($query);
          $data->setFetchMode(PDO::FETCH_ASSOC);
          
          // Loop to print data values
          foreach($data as $row){
            print " <tr>";
              foreach ($row as $name=>$value){
                print " <td>$value</td>";
              }
            print " </tr>";
          } 
          print "</table>";
          print "<br/>";

          // Query 2
          print "<p>Query 2:</p>
          <pre><code>SELECT D.did, count(*)  
          FROM Car C, Dealership D
          WHERE C.did = D.did 
          GROUP BY D.did
          HAVING D.did = 4;</code></pre>";
          print "<p>Result:</p>"; 

          $query = "SELECT D.did, count(*)  
          FROM Car C, Dealership D
          WHERE C.did = D.did 
          GROUP BY D.did
          HAVING D.did = 4;";
          
          // Gets the column names
          print "<table class='table table-bordered'>";
          $result = $con->query($query);
          
          // Returns field names
          $row = $result->fetch(PDO::FETCH_ASSOC);
          print " <tr>";

          // Loop to print field names
          foreach ($row as $field => $value){
            print " <th>$field</th>";
          }
          print " </tr>";

          // Gets the data
          $data = $con->query($query);
          $data->setFetchMode(PDO::FETCH_ASSOC);
          
          // Loop to print data values
          foreach($data as $row){
            print " <tr>";
              foreach ($row as $name=>$value){
                print " <td>$value</td>";
              }
            print " </tr>";
          } 
          print "</table>";
          print "<br/>";

          // Query 3
          print "<p>Query 3:</p>
          <pre><code>SELECT C.name, C.address 
          FROM Customer C
          WHERE C.ssn 
          IN (SELECT DISTINCT D.ssn FROM Car D WHERE D.price < 150000);</code></pre>";
          print "<p>Result:</p>"; 

          $query = "SELECT C.name, C.address 
          FROM Customer C
          WHERE C.ssn 
          IN (SELECT DISTINCT D.ssn FROM Car D WHERE D.price < 150000);";
          
          // Gets the column names
          print "<table class='table table-bordered'>";
          $result = $con->query($query);
          
          // Returns field names
          $row = $result->fetch(PDO::FETCH_ASSOC);
          print " <tr>";

          // Loop to print field names
          foreach ($row as $field => $value){
            print " <th>$field</th>";
          }
          print " </tr>";

          // Gets the data
          $data = $con->query($query);
          $data->setFetchMode(PDO::FETCH_ASSOC);
          
          // Loop to print data values
          foreach($data as $row){
            print " <tr>";
              foreach ($row as $name=>$value){
                print " <td>$value</td>";
              }
            print " </tr>";
          } 
          print "</table>";
          print "<br/>";

          // Query 4
          print "<p>Query 4:</p>
          <pre><code>SELECT C.name, C.phone
          FROM Customer C
          WHERE C.ssn NOT IN (SELECT R.ssn FROM Car R);</code></pre>";
          print "<p>Result:</p>"; 

          $query = "SELECT C.name, C.phone
          FROM Customer C
          WHERE C.ssn NOT IN (SELECT R.ssn FROM Car R);";
          
          // Gets the column names
          print "<table class='table table-bordered'>";
          $result = $con->query($query);
          
          // Returns field names
          $row = $result->fetch(PDO::FETCH_ASSOC);
          print " <tr>";

          // Loop to print field names
          foreach ($row as $field => $value){
            print " <th>$field</th>";
          }
          print " </tr>";

          // Gets the data
          $data = $con->query($query);
          $data->setFetchMode(PDO::FETCH_ASSOC);
          
          // Loop to print data values
          foreach($data as $row){
            print " <tr>";
              foreach ($row as $name=>$value){
                print " <td>$value</td>";
              }
            print " </tr>";
          } 
          print "</table>";
          //print "<br/>";
          print "</div>"; // Queries div
          
          // End second main div
          print "<br/>";
          print "</div>";
          print "</div>"; // Content wrap div
          print "</div>"; // Page container div
      ?>
    </p>
  </body>
</html>
