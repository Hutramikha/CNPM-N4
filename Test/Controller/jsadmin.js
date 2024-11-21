document.addEventListener("DOMContentLoaded", () => {

    const toggleMenu = document.querySelector(".toggle-menu");
    const sidebar = document.querySelector(".admin_sidebar");
    const submenu = document.querySelector(".sub-menu-show");

    const profileImage = document.getElementById("profile-img");
    const profileDetails = document.querySelector(".profile-details");
    const arrowicon = toggleMenu.querySelector('.arrow_menu');

    if (sidebar.classList.contains("close")) {
        if (profileImage.style.maxHeight === "50px") {
            profileImage.style.maxHeight = "60px"; // Trở về kích thước ban đầu
            profileImage.style.maxWidth = "60px";  // Trở về kích thước ban đầu
            profileDetails.style.background = "#09025e"; // Trở về màu nền ban đầu
            arrowicon.classList.remove('bxs-right-arrow-square');
            arrowicon.classList.add('bxs-left-arrow-square');
        } else {
            profileImage.style.maxHeight = "50px"; // Thay đổi kích thước ảnh
            profileImage.style.maxWidth = "50px";  // Thay đổi kích thước ảnh
            profileDetails.style.background = "#060244"; // Thay đổi màu nền
            arrowicon.classList.remove('bxs-left-arrow-square');
            arrowicon.classList.add('bxs-right-arrow-square');
        }
    } else { }

    toggleMenu.addEventListener("click", () => {
        if (subMenu.classList.contains('show')) {
            closeSubMenu();
        } else { }
        sidebar.classList.toggle("close");

        if (profileImage.style.maxHeight === "50px") {
            profileImage.style.maxHeight = "60px"; // Trở về kích thước ban đầu
            profileImage.style.maxWidth = "60px";  // Trở về kích thước ban đầu
            profileDetails.style.background = "#09025e"; // Trở về màu nền ban đầu
            arrowicon.classList.remove('bxs-right-arrow-square');
            arrowicon.classList.add('bxs-left-arrow-square');
        } else {
            profileImage.style.maxHeight = "50px"; // Thay đổi kích thước ảnh
            profileImage.style.maxWidth = "50px";  // Thay đổi kích thước ảnh
            profileDetails.style.background = "#060244"; // Thay đổi màu nền
            arrowicon.classList.remove('bxs-left-arrow-square');
            arrowicon.classList.add('bxs-right-arrow-square');
        }
    })

    function opensidebar() {
        if (sidebar.classList.contains("close")) {
            sidebar.classList.toggle("close");
            if (profileImage.style.maxHeight === "50px") {
                profileImage.style.maxHeight = "60px"; // Trở về kích thước ban đầu
                profileImage.style.maxWidth = "60px";  // Trở về kích thước ban đầu
                profileDetails.style.background = "#09025e"; // Trở về màu nền ban đầu
                arrowicon.classList.remove('bxs-right-arrow-square');
                arrowicon.classList.add('bxs-left-arrow-square');
            } else {
                profileImage.style.maxHeight = "50px"; // Thay đổi kích thước ảnh
                profileImage.style.maxWidth = "50px";  // Thay đổi kích thước ảnh
                profileDetails.style.background = "#060244"; // Thay đổi màu nền
                arrowicon.classList.remove('bxs-left-arrow-square');
                arrowicon.classList.add('bxs-right-arrow-square');
            }
        } else {
            console.log("oke");
        }
    }


    const toggleButton = document.querySelector(".sub-menu-show");
    const subMenu = document.querySelector(".sub-menu");
    const toggleArrow = document.querySelector('.toggle-arrow');


    toggleButton.addEventListener("click", () => {
        if (subMenu.classList.contains('show')) {
            closeSubMenu();
        } else {
            openSubMenu();
        }
    });


    function openSubMenu() {
        subMenu.style.display = 'block'; // Hiện submenu trước khi áp dụng hiệu ứng
        setTimeout(() => {
            opensidebar();
            subMenu.style.opacity = 1; // Áp dụng độ mờ sau khi hiển thị
            subMenu.classList.add('show'); // Thêm class 'show'
            toggleArrow.classList.remove('bx-chevron-down'); // Đổi thành mũi tên hướng lên
            toggleArrow.classList.add('bx-chevron-up');
        }, 5);
    }

    function closeSubMenu() {
        subMenu.style.opacity = 0; // Đặt độ mờ về 0
        setTimeout(() => {
            subMenu.classList.remove('show');
            subMenu.style.display = 'none'; // Ẩn submenu ngay lập tức sau khi độ mờ về 0
            toggleArrow.classList.remove('bx-chevron-up'); // Đổi thành mũi tên hướng xuống
            toggleArrow.classList.add('bx-chevron-down');
        }, 20); // Thời gian trễ phải giống với thời gian của transition
    }


    // Ẩn hiện các trang quản lý
    const btn_qlsach = document.querySelector(".btn-qlsach");
    const btn_qlnhanvien = document.querySelector(".btn-qlnhanvien");
    const btn_qldocgia = document.querySelector(".btn-qldocgia");
    const btn_qlmuonsach = document.querySelector(".btn-muonsach");
    const btn_qltrasach = document.querySelector(".btn-trasach");
    const btn_qlphieunhap = document.querySelector(".btn-qlphieunhap");
    const btn_qltaikhoan = document.querySelector(".btn-qltaikhoan");
    const btn_thongke = document.querySelector(".btn-thongke");
    const btn_thongtincanhan = document.querySelector(".btn-thongtincanhan");

    // Hàm để ẩn tất cả các trang
    function hideAllPages() {
        const pages = document.querySelectorAll('.quanlysach, .quanlynhanvien, .quanlydocgia, .quanlymuonsach, .quanlytrasach, .quanlyphieunhap, .quanlytaikhoan, .thongke, .thongtincanhan');
        pages.forEach(page => {
            if (page.classList.contains('showpage')) {
                page.style.opacity = '0'; // Mờ đi
                setTimeout(() => {
                    page.classList.remove('showpage'); // Xóa class showpage sau khi hiệu ứng hoàn tất
                }, 150); // Thời gian trễ bằng thời gian hiệu ứng
            }
        });
    }

    // Hàm để hiển thị trang tương ứng
    function showPage(pageClass) {
        const page = document.querySelector(pageClass);
        hideAllPages(); // Đầu tiên ẩn tất cả các trang
        page.classList.add('showpage'); // Thêm class showpage
        setTimeout(() => {
            page.style.opacity = '1'; // Hiện rõ
        }, 10); // Thời gian trễ nhỏ để kích hoạt hiệu ứng
    }

    btn_qlsach.addEventListener("click", () => showPage('.quanlysach'));
    btn_qlnhanvien.addEventListener("click", () => showPage('.quanlynhanvien'));
    btn_qldocgia.addEventListener("click", () => showPage('.quanlydocgia'));
    btn_qlmuonsach.addEventListener("click", () => showPage('.quanlymuonsach'));
    btn_qltrasach.addEventListener("click", () => showPage('.quanlytrasach'));
    btn_qlphieunhap.addEventListener("click", () => showPage('.quanlyphieunhap'));
    btn_qltaikhoan.addEventListener("click", () => showPage('.quanlytaikhoan'));
    btn_thongke.addEventListener("click", () => showPage('.thongke'));
    btn_thongtincanhan.addEventListener("click", () => showPage('.thongtincanhan'));

    //-----------------Chức năng thể loại
    const openCatForm = document.querySelector('.btn-theloai');
    const closeCatForm = document.querySelector('.btn-close-cat-form');
    const updatecat = document.querySelector('.updatebtn-cat');
    const addcategory = document.querySelector('.addbtn-cat');
    const closecategory = document.querySelector('.cancelcatsubmit');
    const addcatSubmit = document.querySelector('.addcatsubmit');
    const catsearchinput = document.querySelector('.search-cat');
    const catrefresh = document.getElementById('catrefresh');
    catrefresh.addEventListener('click', () => {
        catsearchinput.value = "";
        cancelCatEdit();
    });
    addcategory.addEventListener('click', () => addCategory());
    closecategory.addEventListener('click', () => closeCategory());
    addcatSubmit.addEventListener('click', () => submitCategory());
    updatecat.addEventListener('click', () => catEditTable());
    openCatForm.addEventListener("click", () => CategoryBTN());
    closeCatForm.addEventListener("click", () => CategoryFormExit());
    var countswitchcat = 0;
    // Mở Form Cat
    function CategoryBTN() {
        document.querySelector('.Category').style.display = "flex";
        document.getElementById('book-overlay').style.display = "block";

    }
    // Thoát Form Cat
    function CategoryFormExit() {
        catsearchinput.value = "";
        cancelCatEdit();
        document.querySelector('.Category').style.display = "none";
        document.getElementById('book-overlay').style.display = "none";
    }

    // Load DataFrame Thể Loại
    function fetchTableDataCategory() {
        countswitchcat = 0;
        updatecat.style.backgroundColor = 'orange';
        updatecat.innerText = 'Sửa';

        // Nếu search bar có giá trị fetch.php => fetch?search=$(giá trị mã hóa)
        let url = '../DAO/fetchdataCategory.php';
        if (catsearchinput.value.trim()) {
            url += `?search=${encodeURIComponent(catsearchinput.value.trim())}`;
        }

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data); // Debugging
                const tableBody = document.querySelector('.cat-table-body');
                tableBody.innerHTML = ""; // Clear existing table rows

                data.forEach(row => {
                    const tableRow = document.createElement('tr');
                    tableRow.style.textAlign = "center";
                    tableRow.setAttribute('cat-data-id', row.matl); // Set row's data-id for later reference
                    tableRow.innerHTML = `
                        <td style="">${row.matl}</td>
                        <td style="">${row.tentl}</td>
                        <td><button type="button" class="delete-cat-btn" cat-data-id="${row.matl}" style="background-color:red">Xóa</button></td>
                    `;
                    tableBody.appendChild(tableRow);
                });

                // Add event listeners cho nút xóa ngay sau khi data được truyền vào
                document.querySelectorAll('.delete-cat-btn').forEach(button => {
                    button.addEventListener('click', function () {
                        const categoryId = this.getAttribute('cat-data-id');
                        deleteCategory(categoryId);
                    });
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    }
    window.onload = fetchTableDataCategory();

    // Xóa thể loại
    function deleteCategory(category_id) {
        console.log('Attempting to delete category with ID:', category_id);
        fetch('../DAO/deleteCategory.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `matl=${category_id}`
        })
            .then(response => response.json())
            .then(data => {
                console.log('Delete response:', data); // Log response (check trong console)
                if (data.success) {
                    // Tìm và xóa row mà không reload page (edit trực tiếp trên html ko đụng đến cái j khác)
                    const rowToDelete = document.querySelector(`tr[cat-data-id="${category_id}"]`);
                    if (rowToDelete) {
                        rowToDelete.remove();
                    }
                } else {
                    alert("Error deleting category: " + (data.error || "Unknown error"));
                }
            })
            .catch(error => console.error('Error deleting category:', error));
    }


    // Thêm Thể loại
    function addCategory() {
        document.querySelector('.addcat-input').style.display = 'flex';
        document.getElementById('addcat-overlay').style.display = 'block';
    }
    function closeCategory() {
        document.querySelector('.addcat-input').style.display = 'none';
        document.getElementById('addcat-overlay').style.display = 'none';
        document.getElementById('cat-warning').style.color = "none";
        document.getElementById('cat-warning').innerHTML = "";
    }
    function submitCategory() {
        // values từ input
        var categoryName = document.getElementById('input-tentl').value;

        // valid input?
        if (categoryName) {
            document.getElementById('cat-warning').style.color = "none";
            document.getElementById('cat-warning').innerHTML = "";
            //            Sử dụng AJAX để gửi data đến server web
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../DAO/addCategory.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);

                    if (response.success) {
                        alert(response.message); // "Thể loại được thêm thành công!"
                        // Clear the inputs after adding
                        document.getElementById('input-tentl').value = '';
                        fetchTableDataCategory();
                    } else {
                        alert("An error occurred: " + (response.error || "Unknown error"));
                    }
                }
            };

            xhr.send("&categoryName=" + encodeURIComponent(categoryName));
        } else {
            document.getElementById('cat-warning').style.color = "red";
            document.getElementById('cat-warning').innerHTML = "Hãy điền đầy đủ thông tin";
        }
    }

    //  Cập nhật thể loại
    function catEditTable() {
        console.log(countswitchcat);
        if (countswitchcat === 1) {
            cancelCatEdit();
            countswitchcat = 0;
        } else {
            document.querySelectorAll('.cat-table-body tr').forEach(row => {
                updatecat.style.backgroundColor = 'Red';
                updatecat.innerText = 'Hủy';

                // Enable editable 'tentl'
                const nameCell = row.querySelector('td:nth-child(2)'); // Name cell
                nameCell.contentEditable = 'true';

                // Tạo nút save
                const saveButton = document.createElement('button');
                saveButton.type = "button";
                saveButton.textContent = 'Lưu'; // Save
                saveButton.classList.add('cat-save-btn');

                // Add mỗi row
                const actionCell = row.querySelector('td:nth-child(3)'); // Action cell
                actionCell.appendChild(saveButton);

                // Add event listeners cho Save
                saveButton.addEventListener('click', () => saveCatEdit(row));
                countswitchcat = 1;
            });
        }
    }

    // Function save the edit
    function saveCatEdit(row) {
        const nameCell = row.querySelector('td:nth-child(2)');
        const categoryId = row.getAttribute('cat-data-id');
        const updatedValue = nameCell.textContent;

        updateCatData(categoryId, 'tentl', updatedValue);
    }

    function cancelCatEdit() {
        const table = document.querySelector('.df-cat');
        const rows = table.querySelectorAll('.cat-table-body tr'); // Chỉ chọn những row trong table
        rows.forEach(row => {
            const nameCell = row.querySelector('td:nth-child(2)');
            nameCell.contentEditable = 'false';
        });
        fetchTableDataCategory();
        removeCatEditButtons();
    }

    // Function remove save và support đổi edit mode
    function removeCatEditButtons() {
        document.querySelectorAll('.cat-save-btn').forEach(button => button.remove());
        updatecat.style.backgroundColor = 'orange';
        updatecat.innerText = 'Sửa';
    }

    // Function for handling data update
    function updateCatData(id, column, value) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../DAO/updateCategory.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function () {
            if (xhr.status === 200 && xhr.responseText.trim() === "success") {
                alert("Update successful!");
            }
        };
        xhr.send("id=" + encodeURIComponent(id) + "&column=" + encodeURIComponent(column) + "&value=" + encodeURIComponent(value));
    }

    // Thay vì tìm hiểu nguyên do vì sao mỗi input là enter lại gây lỗi thì thêm dòng này để vá lỗi =))
    document.getElementById('input-tentl').addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
        }
    });
    catsearchinput.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            fetchTableDataCategory(); // Lấy search input value rồi lấy data dựa trên input value đấy
        }
    });


    //----------------- Chức năng hình thức phạt
    const openPenForm = document.querySelector('.btn-hinhthucphat');
    const closePenForm = document.querySelector('.btn-close-pen-form');
    const updatepen = document.querySelector('.updatebtn-pen');
    const addpenalty = document.querySelector('.addbtn-pen');
    const closepenalty = document.querySelector('.cancelpensubmit');
    const addpenSubmit = document.querySelector('.addpensubmit');
    const pensearchinput = document.querySelector('.search-pen');
    const penrefresh = document.getElementById('penrefresh');
    penrefresh.addEventListener('click', () => {
        pensearchinput.value = "";
        cancelPenEdit();
    });
    addpenalty.addEventListener('click', () => addPenalty());
    closepenalty.addEventListener('click', () => closePenalty());
    addpenSubmit.addEventListener('click', () => submitPenalty());
    updatepen.addEventListener('click', () => penEditTable());
    openPenForm.addEventListener("click", () => PenaltyBTN());
    closePenForm.addEventListener("click", () => PenaltyFormExit());
    var countswitchpen = 0;
    // Mở Form Pen
    function PenaltyBTN() {
        document.querySelector('.Penalty').style.display = "flex";
        document.getElementById('return-overlay').style.display = "block";
    }
    // Thoát Form Pen
    function PenaltyFormExit() {
        pensearchinput.value = "";
        cancelPenEdit();
        document.querySelector('.Penalty').style.display = "none";
        document.getElementById('return-overlay').style.display = "none";
    }

    // Load DataFrame hình thức phạt
    function fetchTableDataPenalty() {
        countswitchpen = 0;
        updatepen.style.backgroundColor = 'orange';
        updatepen.innerText = 'Sửa';

        // Nếu search bar có giá trị fetch.php => fetch?search=$(giá trị mã hóa)
        let url = '../DAO/fetchdataPenalty.php';
        if (pensearchinput.value.trim()) {
            url += `?search=${encodeURIComponent(pensearchinput.value.trim())}`;
        }

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data); // Debugging
                const tableBody = document.querySelector('.pen-table-body');
                tableBody.innerHTML = ""; // Clear existing table rows

                data.forEach(row => {
                    const tableRow = document.createElement('tr');
                    tableRow.style.textAlign = "center";
                    tableRow.setAttribute('pen-data-id', row.maphat); // Set row's data-id for later reference
                    tableRow.innerHTML = `
                        <td style="">${row.maphat}</td>
                        <td style="">${row.lydophat}</td>
                        <td style="">${row.phiphat}</td>
                        <td><button type="button" class="delete-pen-btn" pen-data-id="${row.maphat}" style="background-color:red">Xóa</button></td>
                    `;
                    tableBody.appendChild(tableRow);
                });

                // Add event listeners cho nút xóa ngay sau khi data được truyền vào
                document.querySelectorAll('.delete-pen-btn').forEach(button => {
                    button.addEventListener('click', function () {
                        const penaltyId = this.getAttribute('pen-data-id');
                        deletePenalty(penaltyId);
                    });
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    }
    window.onload = fetchTableDataPenalty();

    // Xóa hình thức phạt
    function deletePenalty(penalty_id) {
        console.log('Attempting to delete penalty with ID:', penalty_id);
        fetch('../DAO/deletePenalty.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `maphat=${penalty_id}`
        })
            .then(response => response.json())
            .then(data => {
                console.log('Delete response:', data); // Log response (check trong console)
                if (data.success) {
                    // Tìm và xóa row mà không reload page (edit trực tiếp trên html ko đụng đến cái j khác)
                    const rowToDelete = document.querySelector(`tr[pen-data-id="${penalty_id}"]`);
                    if (rowToDelete) {
                        rowToDelete.remove();
                    }
                } else {
                    alert("Error deleting penalty: " + (data.error || "Unknown error"));
                }
            })
            .catch(error => console.error('Error deleting penalty:', error));
    }


    // Thêm hình thức phạt
    function addPenalty() {
        document.querySelector('.addpen-input').style.display = 'flex';
        document.getElementById('addpen-overlay').style.display = 'block';
    }
    function closePenalty() {
        document.querySelector('.addpen-input').style.display = 'none';
        document.getElementById('addpen-overlay').style.display = 'none';
        document.getElementById('pen-warning').style.color = "none";
        document.getElementById('pen-warning').innerHTML = "";
    }
    function submitPenalty() {
        // values từ input
        var penaltyReason = document.getElementById('input-lido').value;
        var penaltyPrice = document.getElementById('input-phiphat').value;


        // valid input?
        if (penaltyReason && penaltyPrice) {
            document.getElementById('pen-warning').style.color = "none";
            document.getElementById('pen-warning').innerHTML = "";
            //            Sử dụng AJAX để gửi data đến server web
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../DAO/addPenalty.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);

                    if (response.success) {
                        alert(response.message); // "Hình thức phạt được thêm thành công!"
                        // Clear the inputs after adding
                        document.getElementById('input-lido').value = '';
                        document.getElementById('input-phiphat').value = '';
                        fetchTableDataPenalty();
                    } else {
                        alert("An error occurred: " + (response.error || "Unknown error"));
                    }
                }
            };

            xhr.send("&penaltyReason=" + encodeURIComponent(penaltyReason) + "&penaltyPrice=" + encodeURIComponent(penaltyPrice));
        } else {
            document.getElementById('pen-warning').style.color = "red";
            document.getElementById('pen-warning').innerHTML = "Hãy điền đầy đủ thông tin";
        }
    }

    //  Cập nhật hình thức phạt
    function penEditTable() {
        console.log(countswitchpen);
        if (countswitchpen === 1) {
            cancelPenEdit();
            countswitchpen = 0;
        } else {
            document.querySelectorAll('.pen-table-body tr').forEach(row => {
                updatepen.style.backgroundColor = 'Red';
                updatepen.innerText = 'Hủy';

                // Enable editable 'lí do phạt'
                const reasonCell = row.querySelector('td:nth-child(2)'); // Reason cell
                reasonCell.contentEditable = 'true';

                // Enable editable 'phí phạt'
                const priceCell = row.querySelector('td:nth-child(3)'); // Price cell
                priceCell.contentEditable = 'true';

                // Tạo nút save
                const saveButton = document.createElement('button');
                saveButton.type = "button";
                saveButton.textContent = 'Lưu'; // Save
                saveButton.classList.add('pen-save-btn');

                // Add mỗi row
                const actionCell = row.querySelector('td:nth-child(4)'); // Action cell
                actionCell.appendChild(saveButton);

                // Add event listeners cho Save
                saveButton.addEventListener('click', () => savePenEdit(row));
                countswitchpen = 1;
            });
        }
    }

    // Function save the edit
    function savePenEdit(row) {
        const reasonCell = row.querySelector('td:nth-child(2)');
        const priceCell = row.querySelector('td:nth-child(3)');
        const penaltyId = row.getAttribute('pen-data-id');
        const updatedReason = reasonCell.textContent;
        const updatedPrice = priceCell.textContent;

        updatePenData(penaltyId, 'lydophat', updatedReason, 'phiphat', updatedPrice);
    }

    function cancelPenEdit() {
        const table = document.querySelector('.df-pen');
        const rows = table.querySelectorAll('.pen-table-body tr'); // Chỉ chọn những row trong table
        rows.forEach(row => {
            const reasonCell = row.querySelector('td:nth-child(2)');
            const priceCell = row.querySelector('td:nth-child(3)');
            reasonCell.contentEditable = 'false';
            priceCell.contentEditable = 'false';
        });
        fetchTableDataPenalty();
        removePenEditButtons();
    }

    // Function remove save và support đổi edit mode
    function removePenEditButtons() {
        document.querySelectorAll('.pen-save-btn').forEach(button => button.remove());
        updatepen.style.backgroundColor = 'orange';
        updatepen.innerText = 'Sửa';
    }

    // Function for handling data update
    function updatePenData(id, column1, value1, column2, value2) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../DAO/updatePenalty.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function () {
            if (xhr.status === 200 && xhr.responseText.trim() === "success") {
                alert("Update successful!");
            }
        };
        xhr.send("id=" + encodeURIComponent(id) + "&column1=" + encodeURIComponent(column1) + "&value1=" + encodeURIComponent(value1) + "&column2=" + encodeURIComponent(column2) + "&value2=" + encodeURIComponent(value2));
    }

    // Thay vì tìm hiểu nguyên do vì sao mỗi input là enter lại gây lỗi thì thêm dòng này để vá lỗi =))
    document.getElementById('input-lido').addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
        }
    });
    document.getElementById('input-phiphat').addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
        }
    });
    pensearchinput.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            fetchTableDataPenalty(); // Lấy search input value rồi lấy data dựa trên input value đấy
        }
    });

    //-----------------Chức năng tình trạng sách
    const openStatForm = document.querySelector('.btn-tinhtrangsach');
    const closeStatForm = document.querySelector('.btn-close-stat-form');
    const updatestat = document.querySelector('.updatebtn-stat');
    const addstatus = document.querySelector('.addbtn-stat');
    const closestatus = document.querySelector('.cancelstatsubmit');
    const addstatSubmit = document.querySelector('.addstatsubmit');
    const statsearchinput = document.querySelector('.search-stat');
    const statrefresh = document.getElementById('statrefresh');
    statrefresh.addEventListener('click', () => {
        statsearchinput.value = "";
        cancelStatEdit();
    });
    addstatus.addEventListener('click', () => addStatus());
    closestatus.addEventListener('click', () => closeStatus());
    addstatSubmit.addEventListener('click', () => submitStatus());
    updatestat.addEventListener('click', () => statEditTable());
    openStatForm.addEventListener("click", () => StatusBTN());
    closeStatForm.addEventListener("click", () => StatusFormExit());
    var countswitchstat = 0;
    // Mở Form Stat
    function StatusBTN() {
        document.querySelector('.Status').style.display = "flex";
        document.getElementById('book-overlay').style.display = "block";

    }
    // Thoát Form Stat
    function StatusFormExit() {
        statsearchinput.value = "";
        cancelStatEdit();
        document.querySelector('.Status').style.display = "none";
        document.getElementById('book-overlay').style.display = "none";
    }

    // Load DataFrame Tình Trạng
    function fetchTableDataStatus() {
        countswitchstat = 0;
        updatestat.style.backgroundColor = 'orange';
        updatestat.innerText = 'Sửa';

        // Nếu search bar có giá trị fetch.php => fetch?search=$(giá trị mã hóa)
        let url = '../DAO/fetchdataStatus.php';
        if (statsearchinput.value.trim()) {
            url += `?search=${encodeURIComponent(statsearchinput.value.trim())}`;
        }

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data); // Debugging
                const tableBody = document.querySelector('.stat-table-body');
                tableBody.innerHTML = ""; // Clear existing table rows

                data.forEach(row => {
                    const tableRow = document.createElement('tr');
                    tableRow.style.textAlign = "center";
                    tableRow.setAttribute('stat-data-id', row.matinhtrang); // Set row's data-id for later reference
                    tableRow.innerHTML = `
                        <td style="">${row.matinhtrang}</td>
                        <td style="">${row.motatinhtrang}</td>
                        <td><button type="button" class="delete-stat-btn" stat-data-id="${row.matinhtrang}" style="background-color:red">Xóa</button></td>
                    `;
                    tableBody.appendChild(tableRow);
                });

                // Add event listeners cho nút xóa ngay sau khi data được truyền vào
                document.querySelectorAll('.delete-stat-btn').forEach(button => {
                    button.addEventListener('click', function () {
                        const statusId = this.getAttribute('stat-data-id');
                        deleteStatus(statusId);
                    });
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    }
    window.onload = fetchTableDataStatus();

    // Xóa Tình Trạng
    function deleteStatus(status_id) {
        console.log('Attempting to delete status with ID:', status_id);
        fetch('../DAO/deleteStatus.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `matinhtrang=${status_id}`
        })
            .then(response => response.json())
            .then(data => {
                console.log('Delete response:', data); // Log response (check trong console)
                if (data.success) {
                    // Tìm và xóa row mà không reload page (edit trực tiếp trên html ko đụng đến cái j khác)
                    const rowToDelete = document.querySelector(`tr[stat-data-id="${status_id}"]`);
                    if (rowToDelete) {
                        rowToDelete.remove();
                    }
                } else {
                    alert("Error deleting status: " + (data.error || "Unknown error"));
                }
            })
            .catch(error => console.error('Error deleting status:', error));
    }


    // Thêm Tình Trạng
    function addStatus() {
        document.querySelector('.addstat-input').style.display = 'flex';
        document.getElementById('addstat-overlay').style.display = 'block';
    }
    function closeStatus() {
        document.querySelector('.addstat-input').style.display = 'none';
        document.getElementById('addstat-overlay').style.display = 'none';
        document.getElementById('stat-warning').style.color = "none";
        document.getElementById('stat-warning').innerHTML = "";
    }
    function submitStatus() {
        // values từ input
        var statusDesc = document.getElementById('input-mota').value;

        // valid input?
        if (statusDesc) {
            document.getElementById('stat-warning').style.color = "none";
            document.getElementById('stat-warning').innerHTML = "";
            //            Sử dụng AJAX để gửi data đến server web
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../DAO/addStatus.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);

                    //                    if (response.error === "Mã đã tồn tại") {
                    //                        document.getElementById('matt-warning').style.color = "red";
                    //                        document.getElementById('matt-warning').innerHTML = "Mã đã tồn tại";
                    if (response.success) {
                        alert(response.message); // "Thể loại được thêm thành công!"
                        // Clear the inputs after adding
                        //                        document.getElementById('input-matt').value = '';
                        document.getElementById('input-mota').value = '';
                        fetchTableDataStatus();
                    } else {
                        alert("An error occurred: " + (response.error || "Unknown error"));
                    }
                }
            };

            xhr.send("&statusDesc=" + encodeURIComponent(statusDesc));
        } else {
            document.getElementById('stat-warning').style.color = "red";
            document.getElementById('stat-warning').innerHTML = "Hãy điền đầy đủ thông tin";
        }
    }

    //  Cập nhật tình trạng
    function statEditTable() {
        console.log(countswitchstat);
        if (countswitchstat === 1) {
            cancelStatEdit();
            countswitchstat = 0;
        } else {
            document.querySelectorAll('.stat-table-body tr').forEach(row => {
                updatestat.style.backgroundColor = 'Red';
                updatestat.innerText = 'Hủy';

                // Enable editable 'mota'
                const nameCell = row.querySelector('td:nth-child(2)'); // Name cell
                nameCell.contentEditable = 'true';

                // Tạo nút save
                const saveButton = document.createElement('button');
                saveButton.type = "button";
                saveButton.textContent = 'Lưu'; // Save
                saveButton.classList.add('stat-save-btn');

                // Add mỗi row
                const actionCell = row.querySelector('td:nth-child(3)'); // Action cell
                actionCell.appendChild(saveButton);

                // Add event listeners cho Save
                saveButton.addEventListener('click', () => saveStatEdit(row));
                countswitchstat = 1;
            });
        }
    }

    // Function save the edit
    function saveStatEdit(row) {
        const descCell = row.querySelector('td:nth-child(2)');
        const statusId = row.getAttribute('stat-data-id');
        const updatedValue = descCell.textContent;

        updateStatData(statusId, 'motatinhtrang', updatedValue);
    }

    function cancelStatEdit() {
        const table = document.querySelector('.df-stat');
        const rows = table.querySelectorAll('.stat-table-body tr'); // Chỉ chọn những row trong table
        rows.forEach(row => {
            const nameCell = row.querySelector('td:nth-child(2)');
            nameCell.contentEditable = 'false';
        });
        fetchTableDataStatus();
        removeStatEditButtons();
    }

    // Function remove save và support đổi edit mode
    function removeStatEditButtons() {
        document.querySelectorAll('.stat-save-btn').forEach(button => button.remove());
        updatestat.style.backgroundColor = 'orange';
        updatestat.innerText = 'Sửa';
    }

    // Function for handling data update
    function updateStatData(id, column, value) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../DAO/updateStatus.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function () {
            if (xhr.status === 200 && xhr.responseText.trim() === "success") {
                alert("Update successful!");
            }
        };
        xhr.send("id=" + encodeURIComponent(id) + "&column=" + encodeURIComponent(column) + "&value=" + encodeURIComponent(value));
    }

    // Thay vì tìm hiểu nguyên do vì sao mỗi input là enter lại gây lỗi thì thêm dòng này để vá lỗi =))
    document.getElementById('input-mota').addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
        }
    });
    statsearchinput.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            fetchTableDataStatus(); // Lấy search input value rồi lấy data dựa trên input value đấy
        }
    });

    //----------------- Chức năng loại độc giả
    const openRCForm = document.querySelector('.btn-loaidg');
    const closeRCForm = document.querySelector('.btn-close-rc-form');
    const updaterc = document.querySelector('.updatebtn-rc');
    const addrc = document.querySelector('.addbtn-rc');
    const closerc = document.querySelector('.cancelrcsubmit');
    const addrcSubmit = document.querySelector('.addrcsubmit');
    const rcsearchinput = document.querySelector('.search-rc');
    const rcrefresh = document.getElementById('rcrefresh');
    rcrefresh.addEventListener('click', () => {
        rcsearchinput.value = "";
        cancelRCEdit();
    });
    addrc.addEventListener('click', () => addRC());
    closerc.addEventListener('click', () => closeRC());
    addrcSubmit.addEventListener('click', () => submitRC());
    updaterc.addEventListener('click', () => rcEditTable());
    openRCForm.addEventListener("click", () => RCBTN());
    closeRCForm.addEventListener("click", () => RCFormExit());
    var countswitchrc = 0;
    // Mở Form RC
    function RCBTN() {
        document.querySelector('.ReaderCategory').style.display = "flex";
        document.getElementById('reader-overlay').style.display = "block";
    }
    // Thoát Form RC
    function RCFormExit() {
        rcsearchinput.value = "";
        cancelRCEdit();
        document.querySelector('.ReaderCategory').style.display = "none";
        document.getElementById('reader-overlay').style.display = "none";
    }

    // Load DataFrame loại độc giả
    function fetchTableDataRC() {
        countswitchrc = 0;
        updaterc.style.backgroundColor = 'orange';
        updaterc.innerText = 'Sửa';

        // Nếu search bar có giá trị fetch.php => fetch?search=$(giá trị mã hóa)
        let url = '../DAO/fetchdataReaderCategory.php';
        if (rcsearchinput.value.trim()) {
            url += `?search=${encodeURIComponent(rcsearchinput.value.trim())}`;
        }
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data); // Debugging
                const tableBody = document.querySelector('.rc-table-body');
                tableBody.innerHTML = ""; // Clear existing table rows

                data.forEach(row => {
                    const tableRow = document.createElement('tr');
                    tableRow.style.textAlign = "center";
                    tableRow.setAttribute('rc-data-id', row.maloaidocgia); // Set row's data-id for later reference
                    tableRow.innerHTML = `
                        <td style="">${row.maloaidocgia}</td>
                        <td style="">${row.tenloaidocgia}</td>
                        <td style="">${row.soluongsachtoida}</td>
                        <td><button type="button" class="delete-rc-btn" rc-data-id="${row.maloaidocgia}" style="background-color:red">Xóa</button></td>
                    `;
                    tableBody.appendChild(tableRow);
                });

                // Add event listeners cho nút xóa ngay sau khi data được truyền vào
                document.querySelectorAll('.delete-rc-btn').forEach(button => {
                    button.addEventListener('click', function () {
                        const rcId = this.getAttribute('rc-data-id');
                        deleteRC(rcId);
                    });
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    }
    window.onload = fetchTableDataRC();

    // Xóa loại độc giả
    function deleteRC(rc_id) {
        console.log('Attempting to delete reader-category with ID:', rc_id);
        fetch('../DAO/deleteReaderCategory.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `maloaidocgia=${rc_id}`
        })
            .then(response => response.json())
            .then(data => {
                console.log('Delete response:', data); // Log response (check trong console)
                if (data.success) {
                    // Tìm và xóa row mà không reload page (edit trực tiếp trên html ko đụng đến cái j khác)
                    const rowToDelete = document.querySelector(`tr[rc-data-id="${rc_id}"]`);
                    if (rowToDelete) {
                        rowToDelete.remove();
                    }
                } else {
                    alert("Error deleting reader-category: " + (data.error || "Unknown error"));
                }
            })
            .catch(error => console.error('Error deleting reader-category:', error));
    }


    // Thêm loại độc giả
    function addRC() {
        document.querySelector('.addrc-input').style.display = 'flex';
        document.getElementById('addrc-overlay').style.display = 'block';
    }
    function closeRC() {
        document.querySelector('.addrc-input').style.display = 'none';
        document.getElementById('addrc-overlay').style.display = 'none';
        document.getElementById('rc-warning').style.color = "none";
        document.getElementById('rc-warning').innerHTML = "";
    }
    function submitRC() {
        // values từ input
        var RCName = document.getElementById('input-tenldg').value;
        var maxRCbook = document.getElementById('input-sl').value;


        // valid input?
        if (RCName && maxRCbook) {
            document.getElementById('rc-warning').style.color = "none";
            document.getElementById('rc-warning').innerHTML = "";
            //            Sử dụng AJAX để gửi data đến server web
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../DAO/addReaderCategory.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);

                    if (response.success) {
                        alert(response.message); // "loại độc giả được thêm thành công!"
                        // Clear the inputs after adding
                        document.getElementById('input-tenldg').value = '';
                        document.getElementById('input-sl').value = '';
                        fetchTableDataRC();
                    } else {
                        alert("An error occurred: " + (response.error || "Unknown error"));
                    }
                }
            };

            xhr.send("&RCName=" + encodeURIComponent(RCName) + "&maxRCbook=" + encodeURIComponent(maxRCbook));
        } else {
            document.getElementById('rc-warning').style.color = "red";
            document.getElementById('rc-warning').innerHTML = "Hãy điền đầy đủ thông tin";
        }
    }

    //  Cập nhật loại độc giả
    function rcEditTable() {
        console.log(countswitchrc);
        if (countswitchrc === 1) {
            cancelRCEdit();
            countswitchrc = 0;
        } else {
            document.querySelectorAll('.rc-table-body tr').forEach(row => {
                updaterc.style.backgroundColor = 'Red';
                updaterc.innerText = 'Hủy';

                // Enable editable 'tên loại độc giả'
                const reasonCell = row.querySelector('td:nth-child(2)'); // Reason cell
                reasonCell.contentEditable = 'true';

                // Enable editable 'phí phạt'
                const priceCell = row.querySelector('td:nth-child(3)'); // Price cell
                priceCell.contentEditable = 'true';

                // Tạo nút save
                const saveButton = document.createElement('button');
                saveButton.type = "button";
                saveButton.textContent = 'Lưu'; // Save
                saveButton.classList.add('rc-save-btn');

                // Add mỗi row
                const actionCell = row.querySelector('td:nth-child(4)'); // Action cell
                actionCell.appendChild(saveButton);

                // Add event listeners cho Save
                saveButton.addEventListener('click', () => saveRCEdit(row));
                countswitchrc = 1;
            });
        }
    }

    // Function save the edit
    function saveRCEdit(row) {
        const nameCell = row.querySelector('td:nth-child(2)');
        const maxrcbookCell = row.querySelector('td:nth-child(3)');
        const RCId = row.getAttribute('rc-data-id');
        const updatedName = nameCell.textContent;
        const updatedMaxrcbook = maxrcbookCell.textContent;

        updateRCData(RCId, 'tenloaidocgia', updatedName, 'soluongsachtoida', updatedMaxrcbook);
    }

    function cancelRCEdit() {
        const table = document.querySelector('.df-rc');
        const rows = table.querySelectorAll('.rc-table-body tr'); // Chỉ chọn những row trong table
        rows.forEach(row => {
            const nameCell = row.querySelector('td:nth-child(2)');
            const maxrcbookCell = row.querySelector('td:nth-child(3)');
            nameCell.contentEditable = 'false';
            maxrcbookCell.contentEditable = 'false';
        });
        fetchTableDataRC();
        removeRCEditButtons();
    }

    // Function remove save và support đổi edit mode
    function removeRCEditButtons() {
        document.querySelectorAll('.rc-save-btn').forEach(button => button.remove());
        updaterc.style.backgroundColor = 'orange';
        updaterc.innerText = 'Sửa';
    }

    // Function for handling data update
    function updateRCData(id, column1, value1, column2, value2) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../DAO/updateReaderCategory.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function () {
            if (xhr.status === 200 && xhr.responseText.trim() === "success") {
                alert("Update successful!");
            }
        };
        xhr.send("id=" + encodeURIComponent(id) + "&column1=" + encodeURIComponent(column1) + "&value1=" + encodeURIComponent(value1) + "&column2=" + encodeURIComponent(column2) + "&value2=" + encodeURIComponent(value2));
    }

    // Thay vì tìm hiểu nguyên do vì sao mỗi input là enter lại gây lỗi thì thêm dòng này để vá lỗi =))
    document.getElementById('input-tenldg').addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
        }
    });
    document.getElementById('input-sl').addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
        }
    });
    rcsearchinput.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            fetchTableDataRC(); // Lấy search input value rồi lấy data dựa trên input value đấy
        }
    });
    //-----------------Chức năng Nhà xuất bản
    const openPublishForm = document.querySelector('.btn-nxb');
    const closePublishForm = document.querySelector('.btn-close-publish-form');
    const updatepublish = document.querySelector('.updatebtn-publish');
    const addpublish = document.querySelector('.addbtn-publish');
    const closepublish = document.querySelector('.cancelpublishsubmit');
    const addpublishSubmit = document.querySelector('.addpublishsubmit');
    const publishsearchinput = document.querySelector('.search-publish');
    const publishrefresh = document.getElementById('publishrefresh');
    publishrefresh.addEventListener('click', () => {
        publishsearchinput.value = "";
        cancelPublishEdit();
    });
    addpublish.addEventListener('click', () => addPublish());
    closepublish.addEventListener('click', () => closePublish());
    addpublishSubmit.addEventListener('click', () => submitPublish());
    updatepublish.addEventListener('click', () => publishEditTable());
    openPublishForm.addEventListener("click", () => PublishBTN());
    closePublishForm.addEventListener("click", () => PublishFormExit());
    var countswitchpublish = 0;
    // Mở Form Publish
    function PublishBTN() {
        document.querySelector('.Publisher').style.display = "flex";
        document.getElementById('book-overlay').style.display = "block";

    }
    // Thoát Form Publish
    function PublishFormExit() {
        publishsearchinput.value = "";
        cancelPublishEdit();
        document.querySelector('.Publisher').style.display = "none";
        document.getElementById('book-overlay').style.display = "none";
    }

    // Load DataFrame Nhà xuất bản
    function fetchTableDataPublisher() {
        countswitchpublish = 0;
        updatepublish.style.backgroundColor = 'orange';
        updatepublish.innerText = 'Sửa';

        // Nếu search bar có giá trị fetch.php => fetch?search=$(giá trị mã hóa)
        let url = '../DAO/fetchdataPublisher.php';
        if (publishsearchinput.value.trim()) {
            url += `?search=${encodeURIComponent(publishsearchinput.value.trim())}`;
        }

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data); // Debugging
                const tableBody = document.querySelector('.publish-table-body');
                tableBody.innerHTML = ""; // Clear existing table rows

                data.forEach(row => {
                    const tableRow = document.createElement('tr');
                    tableRow.style.textAlign = "center";
                    tableRow.setAttribute('publish-data-id', row.manxb); // Set row's data-id for later reference
                    tableRow.innerHTML = `
                        <td style="">${row.manxb}</td>
                        <td style="">${row.tennxb}</td>
                        <td><button type="button" class="delete-publish-btn" publish-data-id="${row.manxb}" style="background-color:red">Xóa</button></td>
                    `;
                    tableBody.appendChild(tableRow);
                });

                // Add event listeners cho nút xóa ngay sau khi data được truyền vào
                document.querySelectorAll('.delete-publish-btn').forEach(button => {
                    button.addEventListener('click', function () {
                        const publisherId = this.getAttribute('publish-data-id');
                        deletePublisher(publisherId);
                    });
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    }
    window.onload = fetchTableDataPublisher();

    // Xóa nhà xuất bản
    function deletePublisher(publisher_id) {
        console.log('Attempting to delete publisher with ID:', publisher_id);
        fetch('../DAO/deletePublisher.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `manxb=${publisher_id}`
        })
            .then(response => response.json())
            .then(data => {
                console.log('Delete response:', data); // Log response (check trong console)
                if (data.success) {
                    // Tìm và xóa row mà không reload page (edit trực tiếp trên html ko đụng đến cái j khác)
                    const rowToDelete = document.querySelector(`tr[publish-data-id="${publisher_id}"]`);
                    if (rowToDelete) {
                        rowToDelete.remove();
                    }
                } else {
                    alert("Error deleting publisher: " + (data.error || "Unknown error"));
                }
            })
            .catch(error => console.error('Error deleting publisher:', error));
    }


    // Thêm Nhà xuất bản
    function addPublish() {
        document.querySelector('.addpublish-input').style.display = 'flex';
        document.getElementById('addpublish-overlay').style.display = 'block';
    }
    function closePublish() {
        document.querySelector('.addpublish-input').style.display = 'none';
        document.getElementById('addpublish-overlay').style.display = 'none';
        document.getElementById('publish-warning').style.color = "none";
        document.getElementById('publish-warning').innerHTML = "";
    }
    function submitPublish() {
        // values từ input
        var publisherName = document.getElementById('input-tennxb').value;

        // valid input?
        if (publisherName) {
            document.getElementById('publish-warning').style.color = "none";
            document.getElementById('publish-warning').innerHTML = "";
            //            Sử dụng AJAX để gửi data đến server web
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../DAO/addPublisher.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);

                    if (response.success) {
                        alert(response.message); // "NXB được thêm thành công!"
                        // Clear the inputs after adding
                        document.getElementById('input-tennxb').value = '';
                        fetchTableDataPublisher();
                    } else {
                        alert("An error occurred: " + (response.error || "Unknown error"));
                    }
                }
            };

            xhr.send("&publisherName=" + encodeURIComponent(publisherName));
        } else {
            document.getElementById('publish-warning').style.color = "red";
            document.getElementById('publish-warning').innerHTML = "Hãy điền đầy đủ thông tin";
        }
    }

    //  Cập nhật nhà xuất bản
    function publishEditTable() {
        console.log(countswitchpublish);
        if (countswitchpublish === 1) {
            cancelPublishEdit();
            countswitchpublish = 0;
        } else {
            document.querySelectorAll('.publish-table-body tr').forEach(row => {
                updatepublish.style.backgroundColor = 'Red';
                updatepublish.innerText = 'Hủy';

                // Enable editable 'tennxb'
                const nameCell = row.querySelector('td:nth-child(2)'); // Name cell
                nameCell.contentEditable = 'true';

                // Tạo nút save
                const saveButton = document.createElement('button');
                saveButton.type = "button";
                saveButton.textContent = 'Lưu'; // Save
                saveButton.classList.add('publish-save-btn');

                // Add mỗi row
                const actionCell = row.querySelector('td:nth-child(3)'); // Action cell
                actionCell.appendChild(saveButton);

                // Add event listeners cho Save
                saveButton.addEventListener('click', () => savePublishEdit(row));
                countswitchpublish = 1;
            });
        }
    }

    // Function save the edit
    function savePublishEdit(row) {
        const nameCell = row.querySelector('td:nth-child(2)');
        const publisherId = row.getAttribute('publish-data-id');
        const updatedValue = nameCell.textContent;

        updatePublishData(publisherId, 'tennxb', updatedValue);
    }

    function cancelPublishEdit() {
        const table = document.querySelector('.df-publish');
        const rows = table.querySelectorAll('.publish-table-body tr'); // Chỉ chọn những row trong table
        rows.forEach(row => {
            const nameCell = row.querySelector('td:nth-child(2)');
            nameCell.contentEditable = 'false';
        });
        fetchTableDataPublisher();
        removePublishEditButtons();
    }

    // Function remove save và support đổi edit mode
    function removePublishEditButtons() {
        document.querySelectorAll('.publish-save-btn').forEach(button => button.remove());
        updatepublish.style.backgroundColor = 'orange';
        updatepublish.innerText = 'Sửa';
    }

    // Function for handling data update
    function updatePublishData(id, column, value) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../DAO/updatePublisher.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function () {
            if (xhr.status === 200 && xhr.responseText.trim() === "success") {
                alert("Update successful!");
            }
        };
        xhr.send("id=" + encodeURIComponent(id) + "&column=" + encodeURIComponent(column) + "&value=" + encodeURIComponent(value));
    }

    // Thay vì tìm hiểu nguyên do vì sao mỗi input là enter lại gây lỗi thì thêm dòng này để vá lỗi =))
    document.getElementById('input-tennxb').addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
        }
    });
    publishsearchinput.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            fetchTableDataPublisher(); // Lấy search input value rồi lấy data dựa trên input value đấy
        }
    });

});
