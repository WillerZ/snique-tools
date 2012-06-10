<?php
header_remove('x-powered-by');
header_remove('content-location');

$message = file_get_contents('./.message');
$etags = str_split($message, 22);
$num = $_GET["index"];
$etag = $etags[intval($num)];
$etag = str_replace("\n",'',$etag);
srand(intval($num));
$chars = 'abcdef0123456789';
while (strlen($etag) < 22)
{
  $etag .= $chars[rand(0, 15)];
}
$etag = substr($etag,0,6)."-".substr($etag,6,4)."-".substr($etag,10);
$if_none_match = isset($_SERVER['HTTP_IF_NONE_MATCH']) ?
	 stripslashes($_SERVER['HTTP_IF_NONE_MATCH']) : 
		 false ;

if( false !== $if_none_match )
{
  $tags = split( ", ", $if_none_match ) ;
  foreach( $tags as $tag )
  {
    if( $tag == $etag )
    {
      header( "HTTP/1.1 304 NOT MODIFIED" );
      exit;
    }
  }
}
header( "HTTP/1.1 200 OK" );
header( "Content-Type: image/png" );
header( "Cache-Control: public, max-age=60, no-transform, must-revalidate" );
header( 'Etag: "'.$etag.'"' );
$im = imagecreate(40,40);
imagecolorallocate($im, 255, 255, 255);
$black = imagecolorallocate($im, 0, 0, 0);
imagestring($im, 5, 0, 0, $num, $black);
imagepng($im);
imagedestroy($im);
exit;
?>
