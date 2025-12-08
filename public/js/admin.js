// Import modules from js folder
import { approveOrReject } from "./admin/admin.js";
import { deleteItem } from "./admin/admin.js";
import { viewItem } from "./admin/admin.js";
import { viewUser } from "./admin/admin.js";
import { addAsAdmin } from "./admin/admin.js";
import { editUser } from "./admin/admin.js";
import { toggleMenu } from "./admin/nav.js";

const menuToggle = document.getElementById('mobile-menu');
const navLinks = document.querySelector('.nav-links');

if (menuToggle) {
    menuToggle.addEventListener("click", () => {
    toggleMenu(menuToggle, navLinks);
})
}

const approveButtons = document.querySelectorAll('.approve');
const rejectButtons = document.querySelectorAll(".reject");
const deleteItemButtons = document.querySelectorAll(".delete");
const deleteUserButtons = document.querySelectorAll(".delete-users");
const viewItemButtons = document.querySelectorAll(".view");
const viewUserButtons = document.querySelectorAll(".view-users");
const addAsAdminButtons = document.querySelectorAll(".admin_add");
const editUserButtons = document.querySelectorAll(".admin_edit");


approveButtons.forEach((button) => {
    button.addEventListener("click", () => {
        approveOrReject("success", "Claim approved!", "#2c802eff");
    })
})

rejectButtons.forEach((button) => {
    button.addEventListener("click", () => {
        approveOrReject("info", "Claim rejected!", "#ac1f1fff");
    })
})

deleteItemButtons.forEach((button) => {
    button.addEventListener("click", () => {
        deleteItem("success", "Item deleted successfully", "#2c802eff");
    })
})
if (deleteUserButtons) {
    deleteUserButtons.forEach((button) => {
    button.addEventListener("click", () => {
        deleteItem("success", "User deleted successfully", "#2c802eff");
    })
})
}

viewItemButtons.forEach((button) => {
  button.addEventListener('click', (event) => {
    const row = event.target.closest('tr'); // get the clicked row
    const cells = row.querySelectorAll('td');

    // Extract data from the row
    const itemData = {
      id: cells[0].innerText,
      name: cells[1].innerText,
      category: cells[2].innerText,
      status: cells[3].innerText,
      location: cells[4].innerText,
      date: cells[5].innerText,
    };

    // Show read-only form
    viewItem(itemData);
  });
});

viewUserButtons.forEach((button) => {
  button.addEventListener('click', (event) => {
    const row = event.target.closest('tr'); // get the clicked row
    const cells = row.querySelectorAll('td');

    // Extract data from the row
    const itemData = {
      id: cells[0].innerText,
      name: cells[1].innerText,
      email: cells[2].innerText,
      admin_id: cells[3].innerText,
      role: cells[4].innerText,
    };

    // Show read-only form
    viewUser(itemData);
  });
});

addAsAdminButtons.forEach((button) => {
    button.addEventListener("click", (event) => {
        const row = event.target.closest('tr');
        const cells = row.querySelectorAll("td");

        const userData = {
            id: cells[0].innerText,
            name: cells[1].innerText, //We only need this!
            email: cells[2].innerText,
            admin_id: cells[3].innerText,
            role: cells[4].innerText,
        }

        addAsAdmin(userData);
    })
})

editUserButtons.forEach((button) => {
    button.addEventListener("click", (event) => {
        const row = event.target.closest("tr");
        const cells = row.querySelectorAll("td");

        const userData = {
            id: cells[0].innerText,
            name: cells[1].innerText,
            email: cells[2].innerText,
            admin_id: cells[3].innerText,
            role: cells[4].innerText,
        };

        editUser(userData, (updatedUser) => {
            // 🔁 Update the row on the page (optional but nice UX)
            cells[1].innerText = updatedUser.name;
            cells[2].innerText = updatedUser.email;
            cells[3].innerText = updatedUser.admin_id;
            cells[4].innerText = updatedUser.role;

            // 📨 TODO: send updatedUser to your backend (Django/Laravel route)
            // fetch(`/admin/users/${updatedUser.id}`, {
            //     method: "POST",
            //     headers: {
            //         "Content-Type": "application/json",
            //         "X-CSRFToken": "..."
            //     },
            //     body: JSON.stringify(updatedUser)
            // });
        });
    });
});
