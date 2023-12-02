<?php if (!isset($_SESSION)) session_start(); ?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="description" content="Aquarium" />
    <meta name="keywords" content="даниил дыбка, дыбка, дыбка" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Aquarium" />
    <meta property="og:site_name" content="Aquarium" />
    <meta property="og:description" content="Aquarium" />
    <meta property="og:url" content="https://aquarium.org.ru/" />
    <meta property="og:image" content="https://aquarium.org.ru/app/img/logo/cap.png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="600" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Aquarium" />
    <meta name="twitter:description" content="Aquarium" />
    <meta name="twitter:site" content="https://aquarium.org.ru/" />
    <meta name="twitter:image" content="https://aquarium.org.ru/app/img/logo/favicon.ico" />
    <meta name="Author" content="Даниил Дыбка" />
    <link rel="manifest" href="/manifest.json" />

    <link rel="icon" href="/app/img/logo/favicon.ico" type="image/x-icon" />
    <meta name="view-transition" content="same-origin" />

    <script>
        if (matchMedia("(prefers-color-scheme: dark)").media === "not all") {
            document.documentElement.style.display = "none";
            document.head.insertAdjacentHTML(
                "beforeend",
                '<link rel="stylesheet" href="/app/css/light.css" onload="document.documentElement.style.display=\'\'">'
            );
        }
    </script>

    <meta name="color-scheme" content="light dark" />
    <link rel="stylesheet" id="stylesheetlight" href="/app/css/light.css" media="(prefers-color-scheme: light)" />
    <link rel="stylesheet" id="stylesheetdark" href="/app/css/dark.css" media="(prefers-color-scheme: dark)" />

    <link rel="stylesheet" href="/app/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/app/css/index.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) {
                if (document.scripts[j].src === r) {
                    return;
                }
            }
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(89421065, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/89421065" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
</head>
