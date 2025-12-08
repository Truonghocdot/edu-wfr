// Interactivity of Sweet Alerts for different Admin actions

// Approve or Reject function
export function approveOrReject(icon, message, bgColor){
    const Toast = Swal.mixin({
        toast: true,
        position: "bottom-end",
        background: `${bgColor}`,
        color: '#ffffff',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    Toast.fire({
        icon: `${icon}`,
        title: `${message}`,
    });
}

export function viewItem(itemData) {
  Swal.fire({
    title: 'View Item',
    html: `
        <form id="view-item-form" class="swal-form">
            <div class="form-grid">
            <div class="form-group">
                <label>ID:</label>
                <input type="text" class="swal2-input" value="${itemData.id}" disabled>
            </div>
            <div class="form-group">
                <label>Item Name:</label>
                <input type="text" class="swal2-input" value="${itemData.name}" disabled>
            </div>
            <div class="form-group">
                <label>Category:</label>
                <input type="text" class="swal2-input" value="${itemData.category}" disabled>
            </div>
            <div class="form-group">
                <label>Status:</label>
                <input type="text" class="swal2-input" value="${itemData.status}" disabled>
            </div>
            <div class="form-group">
                <label>Location:</label>
                <input type="text" class="swal2-input" value="${itemData.location}" disabled>
            </div>
            <div class="form-group">
                <label>Date:</label>
                <input type="text" class="swal2-input" value="${itemData.date}" disabled>
            </div>
            </div>
        </form>
    `,
    confirmButtonText: 'Close',
    width: '50em',
    grow: 'fullscreen',
    showCancelButton: false,
    focusConfirm: false,
    customClass: {
      popup: 'swal2-view-popup'
    }
  });
}


export function deleteItem(icon, message, bgColor){
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            const Toast = Swal.mixin({
                toast: true,
                position: "bottom-end",
                background: `${bgColor}`,
                color: '#ffffff',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: `${icon}`,
                title: `${message}`,
            });
        }
    });
}


export function viewUser(userData) {
  Swal.fire({
    title: 'View Item',
    html: `
        <form id="view-item-form" class="swal-form">
            <div class="form-grid">
            <div class="form-group">
                <label>ID:</label>
                <input type="text" class="swal2-input" value="${userData.id}" disabled>
            </div>
            <div class="form-group">
                <label>Item Name:</label>
                <input type="text" class="swal2-input" value="${userData.name}" disabled>
            </div>
            <div class="form-group">
                <label>Category:</label>
                <input type="email" class="swal2-input" value="${userData.email}" disabled>
            </div>
            <div class="form-group">
                <label>Status:</label>
                <input type="text" class="swal2-input" value="${userData.admin_id}" disabled>
            </div>
            <div class="form-group">
                <label>Location:</label>
                <input type="text" class="swal2-input" value="${userData.role}" disabled>
            </div>
            </div>
        </form>
    `,
    confirmButtonText: 'Close',
    width: '50em',
    grow: 'fullscreen',
    showCancelButton: false,
    focusConfirm: false,
    customClass: {
      popup: 'swal2-view-popup'
    }
  });
}

export function addAsAdmin(userData){
    Swal.fire({
        title: "Admin Added!",
        text: `${userData.name} is added as an admin!`,
        icon: "succes"
    });
}

export function editUser(userData, onSaveCallback) {
    Swal.fire({
        title: 'Edit User',
        html: `
        <form id="edit-user-form" class="swal-form">
            <div class="form-grid">

                <div class="form-group">
                    <label>ID:</label>
                    <input id="edit-user-id" type="text" class="swal2-input" value="${userData.id}" disabled>
                </div>

                <div class="form-group">
                    <label>Name:</label>
                    <input id="edit-user-name" type="text" class="swal2-input" value="${userData.name}" required>
                </div>

                <div class="form-group">
                    <label>Email:</label>
                    <input id="edit-user-email" type="email" class="swal2-input" value="${userData.email}" required>
                </div>

                <div class="form-group">
                    <label>Student/Admin ID:</label>
                    <input id="edit-user-sa-id" type="text" class="swal2-input" value="${userData.admin_id}" required>
                </div>

                <div class="form-group">
                    <label>Role:</label>
                    <select id="edit-user-role" class="swal2-input">
                        <option value="Student" ${userData.role === "Student" ? "selected" : ""}>Student</option>
                        <option value="Admin" ${userData.role === "Admin" ? "selected" : ""}>Admin</option>
                    </select>
                </div>

            </div>
        </form>
        `,
        showCancelButton: true,
        confirmButtonText: 'Save Changes',
        cancelButtonText: 'Cancel',
        width: '45em',
        focusConfirm: false,

        preConfirm: () => {
            const updatedUser = {
                id: document.getElementById("edit-user-id").value,
                name: document.getElementById("edit-user-name").value.trim(),
                email: document.getElementById("edit-user-email").value.trim(),
                admin_id: document.getElementById("edit-user-sa-id").value.trim(),
                role: document.getElementById("edit-user-role").value
            };

            if (!updatedUser.name || !updatedUser.email || !updatedUser.admin_id) {
                Swal.showValidationMessage("Please fill out all required fields.");
                return false;
            }

            return updatedUser;
        },

        customClass: {
            popup: 'swal2-edit-popup'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Pass back to your CRUD handler
            onSaveCallback(result.value);

            Swal.fire({
                icon: "success",
                title: "User Updated!",
                toast: true,
                position: "bottom-end",
                timer: 2000,
                showConfirmButton: false,
                background: "#4CAF50",
                color: "#fff"
            });
        }
    });
}
