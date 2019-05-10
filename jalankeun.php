<?php
class Adil
{
    /**
     Just Kidding, Script Kiddies
     */
    public function support()
    {
        /**
         * I know who I am, but by upholding justice is it wrong?
         */
        $banner =
            "      MAAF :)";
        echo $banner;
        echo "ID ? ";
        $petId = trim(fgets(STDIN));
        echo "Amount ? ";
        $amount = trim(fgets(STDIN));
        $i=0;
        echo "\n";
        while($i<$amount)
        {
            $check = $this->curl('http://yarzc0de.co.id/api/newad.php', 'petition_id='.$petId);
            if(json_decode($check[1],1)['success'] == true)
            {
                echo "MPP, Samlekom: ".json_decode($check[1],1)['name']."\n";
            } else {
                echo $check[1]."\n";
            }
            $i++;
        }
    }

    private function curl($url, $post=false, $httpheader=false,$cookie=false)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        if($cookie !== false)
        {
            curl_setopt($ch, CURLOPT_COOKIE, $cookie);
            curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
        }
        if($post != false)
        {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        if($httpheader != false)
        {
            curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
            curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
        }
        $response = curl_exec($ch);
        $header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
        $body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
        curl_close($ch);
        return array($header, $body);
    }
}
$a = new Adil();
$a->support();