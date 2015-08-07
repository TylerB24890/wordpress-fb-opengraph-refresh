# Wordpress Facebook Open Graph Cache Refresh

Place this script in your functions.php file or include it in your functions file.

Occasionally when you publish a post on a Wordpress site Facebook will cache that post with the incorrect information. This will effect how your post is shown when it is shared on FB by possibly displaying the wrong image or incorrect excerpt. This script, on post publish, will send a cURL request to Facebook to recrawl your post to generate the proper sharing information. i.e. gather the proper image and excerpt.
