Þ    p                 p	     q	     s	     |	     	  	   	     	  
    	  	   «	  	   µ	     ¿	     Ç	  
   Ü	     ç	  A   ô	     6
     B
  3   J
     ~
     
     
     ¦
  	   ·
  	   Á
     Ë
  	   Ò
     Ü
     ë
     ó
          !     9     U  )   i          ³      Ð     ñ          )     .     =  	   J     T     [     d     x  
     J     Y   â     <  d   E  ÷  ª    ¢  2  º    í    ó  "       ©  	   ª  	   ´     ¾  
   Å  
   Ð     Û  
   é     ô            J  '  	   r     |  (     ²   ´     g     ~               ¥     ³     Ã     Ü     á  	   ð  	   ú                 #   $  Z   H  p   £  5     7   J       f   ¢  g   	  =   q  P   ¯  )      	   *  T   4  C        Í     Õ     ê            R   +  W   ~  H   Ö           =   e  L      ²!     Æ!     Ë!     Ð!     Ö!     Ý!     â!     è!     í!     ò!  !   "     0"  	   @"  E   J"     "     £"  N   °"     ÿ"     #     %#     ;#     K#     a#     h#     o#     #     #     ¢#  5   »#  2   ñ#  &   $$  8   K$  P   $  8   Õ$  /   %  A   >%  ,   %  ,   ­%     Ú%     á%     ï%     ü%     &     &     )&     E&     R&     a&  u   í&     c'  {   j'  "  æ'    	*    £,  ö   ²-    ©.  J  >0  5  1     ¿2     Þ2  	   î2     ø2     3     3     13     G3  $   f3  *   3  Æ  ¶3     }5     5  9   £5  Ù   Ý5     ·6     Ó6  !   ï6  !   7  !   37  '   U7  6   }7     ´7     »7     È7  	   Ø7     â7     é7     ö7  *   	8  N   48     8  ;   #9  H   _9  -   ¨9  d   Ö9  p   ;:  ?   ¬:     ì:  6   n;     ¥;     ¬;  q   3<  	   ¥<     ¯<     Ë<     ç<  !   =  1   %=  s   W=  E   Ë=     >     +>        A               L              p   7       S          '             o   	       1   Z      M                 5       !   ^       6                  _   -          C          e       B      T   l   n       .   U       k       %   i   d         g          $           ?   ,   2   b   V   [   I   *      D   4       K       :   #          `   f   F   P       \   (   )   O   Y          0   @   W   8   +   X                 Q   E         >   J   <      G   N   
   3       R      j   h   c          "             a   /           =   &   ;      ]   m       H   9    . 1 minute 1 second 10 times 100 times 3 times 30 seconds 5 minutes 5 seconds Add New Admin Page IP Filter Admin only Alphanumeric An alphanumeric character, a hyphen, and an underbar can be used. Apply rules CAPTCHA CAPTCHA is added to the login page or comment post. Comment Comment (optional) Comment page Confirm Deletion Dashboard Date Time Delete Directive Directive Type Disable Disable Pingback ERROR: Directive is required ERROR: Invalid CAPTCHA. ERROR: Invalid input value. ERROR: LOGIN LOCKED ERROR: Please check the input and resend. ERROR: Please login entry again ERROR: Signature is required ERROR: Syntax Error in Signature ERROR: Target Path is required ERROR: Unknown Directive Edit Enable/Disable Exclude Path Fail once Failed Filename Filename (optional) Hiragana (Japanese) IP Address In order to use this function, it is necessary to install expanded modules Instead of the detailed error message at the login error, the single message is returned. Interval It is only an alphanumeric character, a hyphen, and an underbar that can be used for New Login Path. It is the function for the protection against the attack to the management page (under /wp-admin/.) To the access from the connection source IP address which does not login to the management page, 404 (Not Found) is returned. At the login, the connection source IP address is recorded and the access to that page is allowed. The connection source IP address which does not login for more than 24 hours is sequentially deleted. The URL (under /wp-admin/) where this function is excluded can be specified. It is the function to create the rule to avoid the false detection in WordPress (including 403 error occurrence with normal access,) if WAF ( SiteGuard Lite ) by JP-Secure is installed on a Web server. WAF prevents the attack from the outside against the Web server, but for some WordPress or plugin functions, WAF may detect the attack which is actually not attack and block the function.
By creating the WAF exclude rule, the WAF protection function can be activated while the false detection for the specified function is prevented. It is the function to decrease the vulnerability against a password list attack. Even is the login input is correct, the first login must fail. After 5 seconds and later within 60 seconds, another correct login input make login succeed. At the first login failure, the following error message is displayed. It is the function to decrease the vulnerability against an illegal login attempt attack such as a brute force attack or a password list attack, or to receive less comment spam. For the character of CAPTCHA, hiragana and alphanumeric characters can be selected. It is the function to decrease the vulnerability against an illegal login attempt attack such as a brute force attack or a password list attack. Especially, it is the function to prevent an automated attack. The connection source IP address the number of login failure of which reaches the specified number within the specified period is blocked for the specified time. Each user account is not locked. It is the function to decrease the vulnerability against an illegal login attempt attack such as a brute force attack or a password list attack. The login page name (wp-login.php) is changed. The initial value is âlogin_&lt;5 random digits&gt;â but it can be changed to a favorite name. It is the function to decrease the vulnerability against the attack to examine if a user name exists. All error messages about the login should be equalized. The single error message is displayed even if anyone of a username, password, or CAPTCHA is wrong. JP-Secure Lock Time Locked Login Lock Login Name Login history Login page Lost password page New Login Path New rule created Only installing SiteGuard WP Plugin on WordPress, its security can be improved. SiteGurad WP Plugin is the plugin specialized for the protection against the attack to the management page and login. It also have the function to create the exclude rule for WAF (SiteGuard Lite, to use it, WAF should be installed on the Web server.) Operation Options saved. Please input characters displayed above. Please specify Directory, if Target Path is a file name and it is Files and a directory name. Please specify FilesMatch and DirectoryMatch, when you specify a regular expression. Registration user page Rename Login Rule deleted Rule updated Rules applied Rules unapplied Same Login Error Message Save Setting status Signature SiteGuard Success Target Path Target user The abuse of pingback is prevented. The connection source which repeats login failure is being locked within a certain period. The detected signature name or signature ID is specified. To specify more than one, separate them with new line. The exclude rule for WAF (SiteGuard Lite) is created. The first login must fail even if the input is correct. The login page name is changed. The management directory (/wp-admin/) is protected against the connection source which does not login. The path of /wp-admin/ henceforth is specified. To specify more than one, separate them with new line.  The pingback function is disabled and its abuse is prevented. The target file name is specified. URL ( the part before ? ) can also be pasted. There are no rules selected for deletion. Threshold To use the WAF Tuning Support, WAF ( SiteGuard Lite ) should be installed on Apache. To use this function, âmod_rewriteâ should be loaded on Apache. Unknown WAF Exclude Rule Add WAF Exclude Rule Delete WAF Exclude Rule Edit WAF Tuning Support You can find docs, FAQ and more detailed information about SiteGuard WP Plugin on  You have specified this rule for deletion: You have specified these rules for deletion: http://www.jp-secure.com/cont/products/siteguard_wp_plugin/index_en.html http://www.jp-secure.com/eng/ in the server. Project-Id-Version: SiteGuard 1.0
Report-Msgid-Bugs-To: http://wordpress.org/tag/siteguard
POT-Creation-Date: 2014-08-15 07:12:01+00:00
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
PO-Revision-Date: 2014-MO-DA HO:MI+ZONE
Last-Translator: Katsuki Naooka <naooka@jp-secure.com>
Language-Team: LANGUAGE <LL@li.org>
  ã«ããã¾ãã 1å 1ç§ 10å 100å 3å 30ç§ 5å 5ç§ æ°ããã«ã¼ã«ãè¿½å  ç®¡çãã¼ã¸ã¢ã¯ã»ã¹å¶é ç®¡çèã®ã¿ è±æ°å­ è±æ°å­ããã¤ãã³ãã¢ã³ãã¼ãã¼ãä½¿ç¨ã§ãã¾ãã ã«ã¼ã«ãé©ç¨ ç»åèªè¨¼ ã­ã°ã¤ã³ãã¼ã¸ãã³ã¡ã³ãæç¨¿ã«ç»åèªè¨¼ãè¿½å ãã¾ãã ã³ã¡ã³ã ã³ã¡ã³ãï¼ä»»æï¼ ã³ã¡ã³ããã¼ã¸ åé¤ã®ç¢ºèª ããã·ã¥ãã¼ã æ¥æ åé¤ ãã£ã¬ã¯ãã£ã ãã£ã¬ã¯ãã£ã ç¡å¹ ãã³ããã¯ç¡å¹å ã¨ã©ã¼: ãã£ã¬ã¯ãã£ããæªå¥åã§ãã ã¨ã©ã¼: ç»åèªè¨¼ãééã£ã¦ãã¾ãã ã¨ã©ã¼: å¥åå¤ãä¸æ­£ã§ãã ã¨ã©ã¼: ã­ã°ã¤ã³ã¯ã­ãã¯ããã¦ãã¾ãã ã¨ã©ã¼: å¥ååå®¹ãç¢ºèªã®ä¸ãããä¸åº¦éä¿¡ãã¦ãã ããã ã¨ã©ã¼: ããä¸åº¦ã­ã°ã¤ã³ãã¦ãã ããã ã¨ã©ã¼: ã·ã°ããã£ãæªå¥åã§ãã ã¨ã©ã¼: ã·ã°ããã£ã®æå®ãæ­£ããããã¾ããã ã¨ã©ã¼: å¯¾è±¡ãã¹ãæªå¥åã§ãã ã¨ã©ã¼: æªå®ç¾©ã®ãã£ã¬ã¯ãã£ã ç·¨é æå¹/ç¡å¹ é¤å¤ãã¹ ãã§ã¼ã«ã¯ã³ã¹ å¤±æ ãã¡ã¤ã«å ãã¡ã¤ã«åï¼ä»»æï¼ ã²ãããª IPã¢ãã¬ã¹ ãã®æ©è½ãä½¿ç¨ããã«ã¯ãæ¬¡ã®æ¡å¼µã¢ã¸ã¥ã¼ã«ããµã¼ãã¼ã«ã¤ã³ã¹ãã¼ã«ããã¦ããå¿è¦gãããã¾ãã ã­ã°ã¤ã³ã¨ã©ã¼æã®è©³ç´°ãªã¨ã©ã¼ã¡ãã»ã¼ã¸ã«å¤ãã¦ãåä¸ã®ã¡ãã»ã¼ã¸ãè¿ãã¾ãã æé å¤æ´å¾ã®ã­ã°ã¤ã³ãã¼ã¸åã«ä½¿ç¨ã§ããã®ã¯ãè±æ°å­ããã¤ãã³ãã¢ã³ãã¼ãã¼ã®ã¿ã§ãã ç®¡çãã¼ã¸ï¼/wp-admin/ä»¥éï¼ã«å¯¾ããæ»æããé²å¾¡ããããã®æ©è½ã§ããã­ã°ã¤ã³ãè¡ããã¦ããªãæ¥ç¶åIPã¢ãã¬ã¹ã«å¯¾ãã¦ãç®¡çãã¼ã¸ã®ã¢ã¯ã»ã¹ãã404(Not Found)ã§è¿ãã¾ããã­ã°ã¤ã³ããã¨ãæ¥ç¶åIPã¢ãã¬ã¹ãè¨é²ãããå½è©²ãã¼ã¸ã®ã¢ã¯ã»ã¹ãè¨±å¯ãã¾ãã24æéä»¥ä¸ã­ã°ã¤ã³ãè¡ãããªãæ¥ç¶åIPã¢ãã¬ã¹ã¯ãé æ¬¡åé¤ããã¾ãããã®æ©è½ãé¤å¤ããURLï¼/wp-admin/ä»¥éï¼ãæå®ãããã¨ãã§ãã¾ãã Webãµã¼ãã¼ã«JP-Secureè£½ã®WAF ( SiteGuard Lite ) ãå°å¥ããã¦ããå ´åã«ãWordPressåã§ã®èª¤æ¤ç¥ï¼æ­£å¸¸ãªã¢ã¯ã»ã¹ãªã®ã«ã403ã¨ã©ã¼ãçºçããç­ï¼ãåé¿ããããã®ã«ã¼ã«ãä½æããæ©è½ã§ããWAFã¯ãWebãµã¼ãã¼ã«å¯¾ããå¤é¨ããã®æ»æãé²ãã¾ãããWordPressã®æ©è½ãããã©ã°ã¤ã³ã®æ©è½ã«ãã£ã¦ã¯ãWAFãæ»æã§ãªãã®ã«æ»æã¨å¤æ­ãã¦ããã®æ©è½ããã­ãã¯ããå ´åãããã¾ããé¤å¤ã«ã¼ã«ãä½æãããã¨ã§ãç¹å®ã®æ©è½ã§ã®èª¤æ¤ç¥ãé²ãã¤ã¤ãå¨ä½ã¨ãã¦ã®WAFã®é²å¾¡æ©è½ãæ´»ãããã¨ãã§ãã¾ãã ãªã¹ãæ»æãåãã«ããããããã®æ©è½ã§ããæ­£ããã­ã°ã¤ã³æå ±ãå¥åãã¦ããï¼åã ãã­ã°ã¤ã³ãå¤±æãã¾ãã5ç§ä»¥éã60ç§ä»¥åã«ååº¦æ­£ããã­ã°ã¤ã³æå ±ãå¥åããã¨ãã­ã°ã¤ã³ãæåãã¾ãã ãã«ã¼ããã©ã¼ã¹æ»æããªã¹ãæ»æç­ã®ãä¸æ­£ã«ã­ã°ã¤ã³ãè©¦ã¿ãæ»æããã³ã¡ã³ãã¹ãã ãåãã«ããããããã®æ©è½ã§ããç»åèªè¨¼ã®æå­ã¯ãã²ãããªã¨è±æ°å­ãé¸æã§ãã¾ãã ãã«ã¼ããã©ã¼ã¹æ»æããªã¹ãæ»æç­ã®ãä¸æ­£ã«ã­ã°ã¤ã³ãè©¦ã¿ãæ»æãåãã«ããããããã®æ©è½ã§ããç¹ã«ãæ©æ¢°çãªæ»æããé²å¾¡ããããã®æ©è½ã§ããã­ã°ã¤ã³ã®å¤±æãæå®æéä¸­ã«æå®åæ°ã«éããæ¥ç¶åIPã¢ãã¬ã¹ãæå®æéãã­ãã¯ãã¾ããã¦ã¼ã¶ã¼ã¢ã«ã¦ã³ãæ¯ã®ã­ãã¯ã¯è¡ãã¾ããã ãã«ã¼ããã©ã¼ã¹æ»æããªã¹ãæ»æç­ã®ãä¸æ­£ã«ã­ã°ã¤ã³ãè©¦ã¿ãæ»æãåãã«ããããããã®æ©è½ã§ããã­ã°ã¤ã³ãã¼ã¸ï¼wp-login.phpï¼ã®ååãå¤æ´ãã¾ããåæå¤ã¯ããlogin_&lt;5æ¡ã®ä¹±æ°&gt;ãã§ããããå¥½ã¿ã®ååã«å¤æ´ãããã¨ãã§ãã¾ãã ã¦ã¼ã¶ã¼åã®å­å¨ãèª¿æ»ããæ»æãåãã«ããããããã®æ©è½ã§ããã­ã°ã¤ã³ã«é¢ããã¨ã©ã¼ã¡ãã»ã¼ã¸ããã¹ã¦åãåå®¹ã«ãªãã¾ããã¦ã¼ã¶ã¼åããã¹ã¯ã¼ããç»åèªè¨¼ã®ã©ããééãã¦ãåãã¨ã©ã¼ã¡ãã»ã¼ã¸ãè¡¨ç¤ºãã¾ãã ã¸ã§ã¤ãã¼ã»ã»ã­ã¥ã¢ ã­ãã¯æé ã­ãã¯ ã­ã°ã¤ã³ã­ãã¯ ã­ã°ã¤ã³å ã­ã°ã¤ã³å±¥æ­´ ã­ã°ã¤ã³ãã¼ã¸ ãã¹ã¯ã¼ãç¢ºèªãã¼ã¸ å¤æ´å¾ã®ã­ã°ã¤ã³ãã¼ã¸å æ°ããã«ã¼ã«ãä½æãã¾ããã SiteGuard WP Pluginã¯ãWordPressã«ã¤ã³ã¹ãã¼ã«ããã ãã§ãã»ã­ã¥ãªãã£ãåä¸ãããã¨ãã§ãã¾ããSiteGurad WP Pluginã¯ãç®¡çãã¼ã¸ã¨ã­ã°ã¤ã³ã«é¢ããæ»æããã®é²å¾¡ã«ç¹åããã»ã­ã¥ãªãã£ãã©ã°ã¤ã³ã§ããWAF ( SiteGuard Lite )ã®é¤å¤ã«ã¼ã«ãä½æããæ©è½ãããã¾ãã( ä½¿ç¨ããã«ã¯WAFãWebãµã¼ãã¼ã«ã¤ã³ã¹ãã¼ã«ããã¦ããå¿è¦ãããã¾ã ) çµæ è¨­å®ãä¿å­ãã¾ããã ä¸ã«è¡¨ç¤ºãããæå­ãå¥åãã¦ãã ããã å¯¾è±¡ãã¹ããã£ã¬ã¯ããªã®å ´åã¯ãDirectoryãããã¡ã¤ã«ã®å ´åã¯Filesãé¸æãã¦ãã ãããæ­£è¦è¡¨ç¾ãä½¿ç¨ããå ´åã¯ãFilesMatch, DirectoryMatchãä½¿ç¨ãã¦ãã ããã ã¦ã¼ã¶ã¼ç»é²ãã¼ã¸ ã­ã°ã¤ã³ãã¼ã¸å¤æ´ ã«ã¼ã«ãåé¤ãã¾ããã ã«ã¼ã«ãæ´æ°ãã¾ããã ã«ã¼ã«ãé©ç¨ãã¾ããã ã«ã¼ã«ã®é©ç¨ãå¤ãã¾ããã ã­ã°ã¤ã³è©³ç´°ã¨ã©ã¼ã¡ãã»ã¼ã¸ã®ç¡å¹å ä¿å­ è¨­å®ç¶æ³ ã·ã°ããã£ SiteGuard æå å¯¾è±¡ãã¹ å¯¾è±¡ã¦ã¼ã¶ã¼ ãã³ããã¯ã®æªç¨ãé²ãã¾ãã ã­ã°ã¤ã³å¤±æãç¹°ãè¿ãæ¥ç¶åãä¸å®æéã­ãã¯ãã¾ãã  æ¤åºããã·ã°ããã£åãã¾ãã¯ãã·ã°ããã£IDãæå®ãã¦ãã ãããè¤æ°æå®ããå ´åã¯ãæ¹è¡ã§åºåã£ã¦ãã ããã WAF (SiteGuard Lite)ã®é¤å¤ã«ã¼ã«ãä½æãã¾ãã æ­£ããå¥åãè¡ã£ã¦ããã­ã°ã¤ã³ãä¸åå¤±æãã¾ãã ã­ã°ã¤ã³ãã¼ã¸åãå¤æ´ãã¾ãã ã­ã°ã¤ã³ãã¦ããªãæ¥ç¶åããç®¡çãã£ã¬ã¯ããªï¼/wp-admin/ï¼ãå®ãã¾ãã /wp-admin/ä»¥éã®ãã¹ãå¥åãã¾ããè¤æ°æå®ããå ´åã¯ãæ¹è¡ã§åºåã£ã¦ãã ããã ãã³ããã¯æ©è½ãç¡å¹ã«ããæªç¨ãé²ãã¾ãã å¯¾è±¡ã®ãã¡ã¤ã«åãæå®ãã¦ãã ãããURLï¼'?'ããåã®é¨åï¼ããã¼ã¹ããããã¨ãåºæ¥ã¾ãã åé¤ããã«ã¼ã«ãæå®ããã¦ãã¾ããã åæ° ãã®æ©è½ãä½¿ç¨ããã«ã¯ãWAF (SiteGuard Lite)ãããµã¼ãã¼ã«ã¤ã³ã¹ãã¼ã«ããã¦ããå¿è¦ãããã¾ãã ãã®æ©è½ãä½¿ç¨ããã«ã¯ãmod_rewriteããµã¼ãã¼ã«ã­ã¼ãããã¦ããå¿è¦ãããã¾ãã æªå®ç¾© WAFé¤å¤ã«ã¼ã«ãè¿½å  WAFé¤å¤ã«ã¼ã«ãåé¤ WAFé¤å¤ã«ã¼ã«ãç·¨é WAFãã¥ã¼ãã³ã°ãµãã¼ã ãã­ã¥ã¡ã³ããFAQããã®ä»ã®æå ±ã¯  ä»¥ä¸ã®ã«ã¼ã«ãåé¤ãããã¨ãã¦ãã¾ãã ä»¥ä¸ã®ã«ã¼ã«ãåé¤ãããã¨ãã¦ãã¾ãã http://www.jp-secure.com/cont/products/siteguard_wp_plugin/index.html http://www.jp-secure.com/ ã 