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
                <button type="button" id="button-qrcode-copy" class="btn btn-primary"
                    onClick="buttonQrcode('{{ $nickname ? route('user.show.nickname', $nickname) : route('user.show.id', $id) }}', 'button-qrcode-copy')">
                    {{ __('Скопировать') }}
                </button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/user/qrcode-copy.js') }}"></script>
<script src="{{ asset('js/user/qrcode.min.js') }}"></script>
<script>
    const qrcodeBlock = document.getElementById("qr-code-generator");
    const data = "{{ $nickname ? route('user.show.nickname', $nickname) : route('user.show.id', $id) }}";
    const size = 512

    const qrcode = new QRCodeStyling({
        width: size,
        height: size,
        type: "svg",
        data: data,
        image: "{{ asset('img/logo/favicon-2.svg') }}",
        dotsOptions: {
            color: "var(--accent)",
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

    const qrcodeHtml = document.querySelector("#qr-code-generator svg");

    qrcodeHtml.setAttribute("viewBox", `0 0 ${size} ${size}`);
</script>
