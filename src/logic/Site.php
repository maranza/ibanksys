<?php

//Fetch'es Web data
//kwesidev

class Site {

    //list of user agents

    const BLACKBERRY = "Mozilla/5.0 (BlackBerry; U; BlackBerry 9800; en-US) AppleWebKit/534.1+ (KHTML, like Gecko)";
    const MOZILLA = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.69 Safari/537.36";
    const OPERAMINI = "Opera/9.80 (J2ME/MIDP; Opera Mini/9.80 (S60; SymbOS; Opera Mobi/23.348; U; en) Presto/2.5.25 Version/10.54";
    const OPERA = "Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14";

    private $URL;
    private $AGENT;
    private $connection;

    private function start($url = NULL) {
        //Making connection to the site
        //just like a normal webbrowser :)
        $this->connection = curl_init();

        curl_setopt($this->connection, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($this->connection, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($this->connection, CURLOPT_ENCODING, "UTF-8");
        $this->setURL($url);
        curl_setopt($this->connection, CURLOPT_RETURNTRANSFER, 1);
    }

    public function __construct($url, $agent = NULL) {

        $this->start($url);

        if ($agent != NULL)
            $this->setUserAgent($agent);
        //else use normal useragent which is curl
    }

    public function setUserAgent($agent) {
        //Set User Agent
        $this->AGENT = $agent;
        curl_setopt($this->connection, CURLOPT_USERAGENT, $this->AGENT);
    }

    public function setURL($url) {
        //Set Url
        $this->URL = $url;
        curl_setopt($this->connection, CURLOPT_URL, $this->URL);
    }

    public function proxy($proxy, $user = NULL, $password = NULL) {
        //Tunnel Through Proxy

        curl_setopt($this->connection, CURLOPT_HTTPPROXYTUNNEL, 1);
        curl_setopt($this->connection, CURLOPT_PROXY, "$proxy");

        //Proxy Authentication
        if ($user != NULL)
            if ($password != NULL)
                curl_setopt($this->connection, CURLOPT_PROXYUSERPWD, "$user:$password");
    }

    public function display() {
        $results = curl_exec($this->connection);
        return($results);
    }

    public function close() {

        curl_close($this->connection);
    }

}
