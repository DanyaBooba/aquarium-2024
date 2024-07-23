$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    // Avatar

    $uploadCrop = $('#upload-avatar').croppie({
        viewport: {
            width: 200,
            height: 200,
            type: 'circle'
        },
        boundary: {
            width: 'auto',
            height: 300
        }
    })

    $(document).on('change', '#upload_avatar', function() {
        const reader = new FileReader()
        reader.onload = function(e) {
            $uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function() {

            })
        }
        reader.readAsDataURL(this.files[0])
    })

    $(document).on('click', '#upload-avatar-button', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(resp) {
            $.ajax({
                url: '/user/settings/appearance/load/avatar',
                type: 'POST',
                data: {
                    'image': resp
                },
                success: function (data) {
                    window.open('/user/settings', '_self')
                }
            })
        })
    })

    // Cap

    $uploadCapCrop = $('#upload-cap').croppie({
        viewport: {
            width: 600,
            height: 300,
            type: 'box'
        },
        boundary: {
            width: 800,
            height: 400
        },
    })

    $uploadCapCrop.croppie('result', 'base64', { width: 1200, height: 600 }, 'jpeg')

    $(document).on('change', '#upload_cap', function() {
        const reader = new FileReader()
        reader.onload = function (e) {
            $uploadCapCrop.croppie('bind', {
                url: e.target.result
            })

            $uploadCapCrop.croppie('result', {
                type: 'base64',
                size: {
                    width: 1200,
                    height: 600
                },
                format: 'jpeg'
            })
        }
        reader.readAsDataURL(this.files[0])
    })

    $(document).on('click', '#upload-cap-button', function (ev) {
        $uploadCapCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(resp) {
            $.ajax({
                url: '/user/settings/appearance/load/cap',
                type: 'POST',
                data: {
                    'image': resp
                },
                success: function (data) {
                    window.open('/user/settings', '_self')
                }
            })
        })
    })
})
