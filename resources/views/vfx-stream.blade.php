<html SameSite='none' itemscope itemtype="http://schema.org/Product" prefix="og: http://ogp.me/ns#"
      xmlns="http://www.w3.org/1999/html">
<?php if (empty(@$_GET['boot']) || !isset($_GET['boot'])) {
    //header("location: /");
}
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico?cache=no">
    <link rel="icon" href="favicon.icog?cache=no" type="image/x-icon">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Tangerine">
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Roboto;
    }

    .leftwatermark {
        left: 20px;
        top: 40px;
        background-position: center left;
    }

    .watermark {
        position: absolute;
        top: 28;
        width: 186px;
        height: 74px;
        z-index: 2;
    }

    .watermark, button, form {
        display: block;
    }

    .leftwatermark, .watermark {
        background-size: contain;
        background-repeat: no-repeat;
    }
</style>
<body>
<div id="main-body">
    <div id="loader"
         style="position:absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: white; z-index: 9999999; text-align: center">
        <div style="width: 50%; margin: auto;">
            <h3 style="margin-top: 20%">Loading Class Room</h3>
            <img id="logox" width="200" height="200" src="{{url('/')}}/loaderx.gif" alt="">
            <h5 style="color: #ff0300">PLEASE PAY ATTENTION TO ALLOW MIC AND CAMERA PERMISSION TOP LEFT CORNER</h5>
            <a style="text-decoration: none; font-size: 10px" href="">reload</a>
        </div>
    </div>
    <a onClick="toggleFullscreen()" href="#" target="_blank">
        <div class="watermark leftwatermark"
             style="z-index: 999999999; background-image: url('https://sites.google.com/site/thisisjustatest2294/_/rsrc/1468742544208/project-resources/image-search/google-image-search/Screen%20Shot%202015-11-28%20at%201.14.27%20PM.png')"></div>
    </a>
    <div id="stream" style="display: none; z-index: 0">

    </div>
</div>
<script>
    function toggleFullscreen() {
        let elem = document.querySelector("#main-body");
        if (!document.fullscreenElement) {
            elem.requestFullscreen().catch(err => {
                //alert("Your browser does't support fullscreen mode, update or use latest chrome");
            });
        } else {
            document.exitFullscreen();
        }
    }

    window.onkeydown = function (e) {
        if (e.keyCode === 20) {
            toggleFullscreen();
        }
    }

    let user = {classID: 'schooltry-'<?php echo $cid; ?>}
    user = JSON.parse(user);
</script>
<script src="https://meet.jit.si/external_api.js"></script>
<script>
    let appName = "SchoolTry";
    let appUrl = "url";
    let globalToolBars = [];
    let medialControl = false;
    let userType = true;
    //inter face control
    let interfaceControl = [];
    //filter based on user invoked
    if (user.isAdmin === null || user.name === null) {
        //redirect
        window.location.href = "/";
    }
    //role selector
    if (user.isAdmin) {
        adminRole();
        userType = false;
    } else {
        userRole();
    }

    //function selector
    function userRole() {
        globalToolBars = [
            'microphone', 'camera', 'closedcaptions',
            'fodeviceselection', 'hangup', 'profile', 'chat', 'settings', 'raisehand',
            'videoquality', 'tileview'
        ];
        interfaceControl = ['devices', 'language', 'profile', 'calendar'];
        medialControl = true
    }

    function adminRole() {
        globalToolBars = [
            'microphone', 'camera', 'closedcaptions', 'desktop',
            'fodeviceselection', 'hangup', 'profile', 'chat',
            'livestreaming', 'etherpad', 'sharedvideo', 'settings', 'raisehand',
            'videoquality', 'filmstrip', 'recording', 'feedback', 'stats',
            'tileview', 'videobackgroundblur', 'download', 'mute-everyone',
            'e2ee'
        ];
        interfaceControl = ['devices', 'language', 'moderator', 'profile', 'calendar'];
        medialControl = false;
    }

    //var domain = "reedax-ndc.icu";
    var domain = "meet.jit.si";
    var options = {
        roomName: user.classID,
        width: '100%',
        height: '100%',
        parentNode: document.querySelector('#stream'),
        configOverwrite: {
            resolution: 520,
            transcribingEnabled: false,
            startWithAudioMuted: medialControl, //Mute audio on join
            startWithVideoMuted: medialControl,  //Mute video on join
            liveStreamingEnabled: false, //for live streaming
            fileRecordingsEnabled: true, //enable file recording button
            requireDisplayName: false,
            enableClosePage: false,
            enableWelcomePage: false,
            prejoinPageEnabled: false,
            disableInviteFunctions: false,
            p2p: {disableH264: true},
            externalConnectUrl: appUrl,
            deploymentUrls: {
                userDocumentationURL: appUrl,
                downloadAppsUrl: appUrl
            },
            localRecording: {
                enabled: true,
            },
            dropbox: {
                appKey: 'dpls489hvxt79dv',
                redirectURI: appUrl
            },
            remoteVideoMenu: {
                // If set to true the 'Kick out' button will be disabled.
                disableKick: userType
            },
            disableRemoteMute: userType,
            // The hex value for the colour used as background
            backgroundColor: '#fff',
            // The url for the image used as background
            backgroundImageUrl: appUrl + '/logo.png',

            // The anchor url used when clicking the logo image
            logoClickUrl: appUrl,
            // The url used for the image used as logo
            logoImageUrl: appUrl
        },
        interfaceConfigOverwrite: {
            filmStripOnly: false,
            FILM_STRIP_MAX_HEIGHT: null,
            DEFAULT_LOGO_URL: appUrl + '/logo.png',
            TOOLBAR_BUTTONS: globalToolBars,
            SETTINGS_SECTIONS: interfaceControl,
            SHOW_JITSI_WATERMARK: true,
            SHOW_BRAND_WATERMARK: true,
            SHOW_DEEP_LINKING_IMAGE: false,
            JITSI_WATERMARK_LINK: appUrl,
            BRAND_WATERMARK_LINK: appUrl,
            APP_NAME: appName,
            NATIVE_APP_NAME: appName,
            PROVIDER_NAME: 'Reedax.Stream',
            DISPLAY_WELCOME_PAGE_CONTENT: false,
            LANG_DETECTION: false, // Allow i18n to detect the system language
            INVITATION_POWERED_BY: false,
            CLOSE_PAGE_GUEST_HINT: false,
            SHOW_PROMOTIONAL_CLOSE_PAGE: false,
            LIVE_STREAMING_HELP_LINK: 'https://youtube.com/live-api',
            SHOW_WATERMARK_FOR_GUESTS: false,
            MOBILE_APP_PROMO: false,
            SUPPORT_URL: appUrl,
            DEFAULT_REMOTE_DISPLAY_NAME: appName + ' Student',
            MOBILE_DOWNLOAD_LINK_ANDROID: appUrl,
            MOBILE_DOWNLOAD_LINK_IOS: appUrl,
            ENFORCE_NOTIFICATION_AUTO_DISMISS_TIMEOUT: 3500,
            SHOW_CHROME_EXTENSION_BANNER: false,
            SHOW_POWERED_BY: false,
            AUTO_PIN_LATEST_SCREEN_SHARE: 'remote-only'
        },
        userInfo: {
            email: user.email,
            displayName: user.name
        }
    };
    let img = document.querySelector('img');
    let api;

    function loaded() {
        api = new JitsiMeetExternalAPI(domain, options);
        api.on('videoConferenceJoined', function (e) {
            document.getElementById('loader').style.display = 'none';
            setTimeout(function () {
                document.getElementById('stream').style.display = 'block';
            }, 3000);
        });
        api.executeCommand('subject', 'Live Class');
        api.on('readyToClose', function () {
            api.dispose();
            window.location.href = "/";
        });
    }

    if (img.complete) {
        loaded()
    } else {
        img.addEventListener('load', loaded)
        img.addEventListener('error', function () {
            alert('error')
        })
    }
    //auto scripting
    // setInterval(function(){
    //     var elmnt = iframe.contentWindow.document.getElementsByTagName("a")[0];
    //     elmnt.style.display = "none";
    //     console.log(c1);
    // },2000);
</script>
</body>
</html>
