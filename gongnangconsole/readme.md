
server {
    listen       8083;
    server_name  www.gongnangconsole.com;

    access_log  gongnangconsole.access.log;
    error_log   gongnangconsole.error.log;

    root 'D:/WWW/gongnangwang/gongnangconsole';
    index       index.php index.html index.htm;

    location / {
        if (!-e $request_filename) {
           rewrite  ^/(.*)$  /index.php/$1  last;
           break;
        }
    }

    location ~ .*\.(gif|jpg|jpeg|png|bmp|swf)$ {
        expires 100d;
    }
    location ~ .*\.(js|css)?$ {
        expires 30d;
    }

    #error_page  404              /404.html;

    # redirect server error pages to the static page /50x.html
    #
    error_page   500 502 503 504  /50x.html;
    location = /50x.html {
        root   html;
    }

    # pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
    #
    location ~ \.php(/|$) {
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_index  index.php;
        include        fastcgi.conf;

        set $fastcgi_script_name2 $fastcgi_script_name;
        if ($fastcgi_script_name ~ "^(.+\.php)(/.+)$") {
            set $fastcgi_script_name2 $1;
            set $path_info $2;
        }
        fastcgi_param   PATH_INFO $path_info;
        fastcgi_param   SCRIPT_FILENAME   $document_root$fastcgi_script_name2;
        fastcgi_param   SCRIPT_NAME   $fastcgi_script_name2;
    }
}

    location ~ [^/]\.php(/|$) {
        fastcgi_pass 127.0.0.1:9000;
        #fastcgi_pass unix:/dev/shm/php-cgi.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi.conf;
        }