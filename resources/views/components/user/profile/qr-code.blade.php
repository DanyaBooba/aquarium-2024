<div class="modal modal-qrcode fade" id="qrCodeModal" tabindex="-1" aria-labelledby="qrCodeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                @if ($nickname)
                    <h4>
                        {{ $nickname }}
                    </h4>
                @endif
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="qr-code-generator" class="qr-code-generator"
                    title="{{ $nickname ? route('user.show.nickname', $nickname) : route('user.show.id', $id) }}"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark"
                    onClick="buttonCopyURL('{{ $nickname ? route('user.show.nickname', $nickname) : route('user.show.id', $id) }}')">
                    {{ __('Скопировать') }}
                </button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/user/qrcode.min.js') }}"></script>
<script>
    let qrcodeBlock = document.getElementById("qr-code-generator");
    let data = "{{ $nickname ? route('user.show.nickname', $nickname) : route('user.show.id', $id) }}";
    let size = 512;

    let qrcode = new QRCodeStyling({
        width: size,
        height: size,
        type: "svg",
        data: data,
        image: "{{ asset('img/logo/favicon-2.svg') }}",
        dotsOptions: {
            color: "var(--accent-highlight)",
            type: "rounded"
        },
        cornersSquareOptions: {
            type: "extra-rounded"
        },
        backgroundOptions: {
            color: "var(--modal-background)",
        },
        imageOptions: {
            crossOrigin: "anonymous",
            imageSize: 0.4,
            margin: 20
        }
    });

    qrcode.append(qrcodeBlock);

    let qrcodeHtml = document.querySelector("#qr-code-generator svg");

    qrcodeHtml.setAttribute("viewBox", `0 0 ${size} ${size}`);
</script>
