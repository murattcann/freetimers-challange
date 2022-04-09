<h2>Freetimers Coding Test - Top Soil Bag Calculator</h1>
<h4>Installation Guide</h4>
<p>To change DB connection credentials you must change the values in <code> src/Helpers/Database.php</code></p>

<ul>
    <li><a href="#manualInstallation">Manual</a></li>
    <li><a href="#shellInstallation">Running Shell</a></li>
    <li><a href="#testing">Testing</a></li>
</ul>
<hr>


<div id="manualInstallation">
    
    <p>You can set up project with: </p>
    <ol>
        <li><code>git clone https://github.com/murattcann/freetimers.git</code></li>
        <li><code>composer install</code></li>
        <li><code>mysql -u username -p database_name < ./freetimers.sql</code></li>
    </ol>
</div>
<hr>
<div id="shellInstallation">
    <p>If you want to set it up by shell file, you have to change the connection credentials such as <b>database_name, username </b> with your credentials </p>
    <p>
        And run this command on terminal when you inside the project directory: 
        <code>. setup.sh</code>
     </p>
</div>
<hr>
<div id="testing">
    <p>If you want to run unit tests with PHPUnit run this command:</p>
    <p>
        <code>./vendor/bin/phpunit</code>
     </p>
</div>