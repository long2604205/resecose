<!-- Js Plugins -->
{{-- <script>
    function calculate() {
			var kg = document.getElementById("kg-input").value;
			var costInput = document.getElementById("cost-input");
			var costSpan = document.getElementById("cost-span");
            var costSpan2 = document.getElementById("cost-span2");
			var errorMessage = document.getElementById("error-message");

			if (kg <= 0) {
				errorMessage.textContent = "Weight number must be greater than 0";
				costInput.value = "";
				costSpan.textContent = "";
			} else {
				errorMessage.textContent = "";
				var cost = kg * 20000;
				costInput.value = cost.toLocaleString() + " VNĐ";
				costSpan.textContent = cost.toLocaleString() + " VNĐ";
                costSpan2.textContent = cost.toLocaleString() + " VNĐ";

			}
		}
</script> --}}
<script>
    const uploadAreas = document.querySelectorAll('.upload-area');
    const previews = document.querySelectorAll('img[id^="preview-"]');
    const inputs = document.querySelectorAll('input[id^="input-"]');

    uploadAreas.forEach((uploadArea, index) => {
        uploadArea.addEventListener('click', () => {
            inputs[index].click();
        });

        inputs[index].addEventListener('change', () => {
            const file = inputs[index].files[0];
            if (file) {
                const reader = new FileReader();

                reader.addEventListener('load', () => {
                    previews[index].src = reader.result;
                    uploadArea.querySelector('span').style.display = 'none';
                });

                reader.readAsDataURL(file);
            }
        });

        uploadArea.addEventListener('dragover', (event) => {
            event.preventDefault();
            uploadArea.classList.add('dragover');
        });

        uploadArea.addEventListener('dragleave', () => {
            uploadArea.classList.remove('dragover');
        });

        uploadArea.addEventListener('drop', (event) => {
            event.preventDefault();
            uploadArea.classList.remove('dragover');
            const files = event.dataTransfer.files;
            inputs[index].files = files;
            const file = inputs[index].files[0];
            if (file) {
                const reader = new FileReader();
                reader.addEventListener('load', () => {
                    previews[index].src = reader.result;
                    uploadArea.querySelector('span').style.display = 'none';
                });

                reader.readAsDataURL(file);
            }
        });

        previews[index].addEventListener('click', () => {
            previews[index].src = '';
            inputs[index].value = '';
            uploadArea.querySelector('span').style.display = 'block';
        });
    });

</script>
<script>
    function calculate() {
    var kg = document.getElementById("kg-input").value;
    var kgSpan = document.getElementById("kg-span");
    var costInput = document.getElementById("cost-input");
    var costSpan = document.getElementById("cost-span");
    var costSpan2 = document.getElementById("cost-span2");
    var errorMessage = document.getElementById("error-message");

    if (kg <= 0) {
        errorMessage.textContent = "Weight number must be greater than 0";
        costInput.setAttribute("placeholder", "");
        costInput.value = "";
    } else {
        errorMessage.textContent = "";
        kgSpan.textContent = kg + " kg";
        var cost = kg * 10000;
        costInput.setAttribute("placeholder", cost.toLocaleString() + " VNĐ");
        // costInput.value = cost.toLocaleString() + " VNĐ";
        costInput.value = cost;
        costInput.setAttribute("value", cost);
        costSpan.textContent = cost.toLocaleString() + " VNĐ";
        costSpan2.textContent = cost.toLocaleString() + " VNĐ";
    }
}
</script>
<script src="{{asset('client/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('client/js/bootstrap.min.js')}}"></script>
<script src="{{asset('client/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('client/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('client/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('client/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('client/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('client/js/mixitup.min.js')}}"></script>
<script src="{{asset('client/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('client/js/main.js')}}"></script>
