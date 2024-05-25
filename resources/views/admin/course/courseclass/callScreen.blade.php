<html>

<head>
    <style>
        #root {
            width: 100%;
            height: 100%;
            }
    </style>
</head>


<body>
    <div id="root"></div>
    <?php $users = Auth::user(); ?>
</body>
<script src="https://unpkg.com/@zegocloud/zego-uikit-prebuilt/zego-uikit-prebuilt.js"></script>
<script>
window.onload = function () {
    function getUrlParams(url) {
        let urlStr = url.split('?')[1];
        const urlSearchParams = new URLSearchParams(urlStr);
        const result = Object.fromEntries(urlSearchParams.entries());
        return result;
    }


        // Generate a Token by calling a method.
        // @param 1: appID
        // @param 2: serverSecret
        // @param 3: Room ID
        // @param 4: User ID
        // @param 5: Username
    const roomID = getUrlParams(window.location.href)['roomID'] || (Math.floor(Math.random() * 10000) + "");
    
    const userID = Math.floor(Math.random() * 10000) + "";
    const userName = "<?= $users->fname . $users->lname ?>" + userID;
    const appID = 900550774;
    const serverSecret = "0922cf5f6656324aba3c8cb6924b9c7c";
    const kitToken = ZegoUIKitPrebuilt.generateKitTokenForTest(appID, serverSecret, roomID, userID, userName);
    console.log(kitToken);
    
        const zp = ZegoUIKitPrebuilt.create(kitToken);
        zp.joinRoom({
            container: document.querySelector("#root"),
            sharedLinks: [{
                name: 'Personal link',
                url: window.location.protocol + '//' + window.location.host  + window.location.pathname + '?roomID=' + roomID,
            }],
            scenario: {
                mode: ZegoUIKitPrebuilt.VideoConference,
            },
                
            turnOnMicrophoneWhenJoining: true,
            turnOnCameraWhenJoining: true,
            showMyCameraToggleButton: true,
            showMyMicrophoneToggleButton: true,
            showAudioVideoSettingsButton: true,
            showScreenSharingButton: true,
            showTextChat: true,
            showUserList: true,
            maxUsers: 2,
            layout: "Auto",
            showLayoutButton: true,
         
            });
}
</script>

</html>