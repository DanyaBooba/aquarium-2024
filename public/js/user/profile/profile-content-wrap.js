function profileContentDetectWrap() {
    const content = document.querySelector('.user-profile-content')
    const infoContent = document.querySelector('.user-profile-right')
    const buttonInfo = document.getElementById('buttonProfileInfo')
    if(!content || !infoContent || !buttonInfo) return
    if (content.offsetHeight > 120) {
        infoContent.classList.add('d-none')
        buttonInfo.classList.remove('d-none')
    }
    else {
        infoContent.classList.remove('d-none')
        buttonInfo.classList.add('d-none')
    }
}

profileContentDetectWrap()
