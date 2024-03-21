<!-- 헤더 메뉴 -->
<ul id="menu">
    <li><a href="#" class="menu-link" data-page="page1.php">Page 1</a></li>
    <li><a href="#" class="menu-link" data-page="page2.php">Page 2</a></li>
    <li><a href="#" class="menu-link" data-page="page3.php">Page 3</a></li>
</ul>

<!-- 메인 섹션 -->
<section id="main-content">
    <!-- Ajax를 통해 여기에 동적으로 페이지를 로드합니다 -->
</section>

<script>
    // 각 링크에 대한 이벤트 리스너 추가
    document.querySelectorAll('.menu-link').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault(); // 기본 동작 중지

            // 활성화된 링크의 클래스를 제거
            document.querySelectorAll('.menu-link').forEach(function(item) {
                item.classList.remove('active');
            });

            // 클릭한 링크에 활성화 클래스 추가
            this.classList.add('active');

            // 페이지 로드
            loadPage(this.getAttribute('data-page'));
        });
    });

    function loadPage(page) {
        // Ajax를 사용하여 페이지의 내용을 가져와서 메인 섹션에 삽입합니다
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("main-content").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", page, true);
        xhttp.send();
    }
</script>
