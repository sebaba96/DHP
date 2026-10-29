(function () {
  var header = document.querySelector(".site-header");
  var toggle = document.querySelector(".nav-toggle");
  var nav = document.querySelector(".site-nav");

  if (header) {
    var onScroll = function () {
      header.classList.toggle("is-scrolled", window.scrollY > 8);
    };
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
  }

  if (toggle && nav) {
    var closeNav = function () {
      document.documentElement.classList.remove("nav-open");
      toggle.setAttribute("aria-expanded", "false");
    };

    toggle.addEventListener("click", function () {
      var willOpen = toggle.getAttribute("aria-expanded") !== "true";
      document.documentElement.classList.toggle("nav-open", willOpen);
      toggle.setAttribute("aria-expanded", willOpen ? "true" : "false");
      if (willOpen) {
        var firstLink = nav.querySelector("a");
        if (firstLink) {
          firstLink.focus();
        }
      }
    });

    nav.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", closeNav);
    });

    document.addEventListener("keydown", function (event) {
      if (event.key === "Escape" && toggle.getAttribute("aria-expanded") === "true") {
        closeNav();
        toggle.focus();
      }
    });

    var desktop = window.matchMedia("(min-width: 1181px)");
    var onDesktop = function (event) {
      if (event.matches) {
        closeNav();
      }
    };
    if (desktop.addEventListener) {
      desktop.addEventListener("change", onDesktop);
    }
  }

  document.querySelectorAll(".faq-question").forEach(function (button) {
    button.addEventListener("click", function () {
      var item = button.closest(".faq-item");
      var open = button.getAttribute("aria-expanded") === "true";
      button.setAttribute("aria-expanded", open ? "false" : "true");
      item.classList.toggle("is-open", !open);
    });
  });

  var form = document.querySelector(".contact-form");
  if (!form) {
    return;
  }

  var messages = {
    ime: "Upiši ime i prezime.",
    email: "Upiši ispravnu adresu e-pošte.",
    telefon: "Upiši broj telefona.",
    poruka: "Napiši kratak opis što trebaš."
  };

  var emailPattern = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+$/;

  var validate = function (name, value) {
    var text = value.trim();
    if (name === "ime") {
      return text.length >= 2 && text.length <= 80 ? "" : messages.ime;
    }
    if (name === "email") {
      return text.length <= 254 && emailPattern.test(text) ? "" : messages.email;
    }
    if (name === "telefon") {
      return /^[0-9+\s()./-]+$/.test(text) && text.length <= 30 ? "" : messages.telefon;
    }
    if (name === "poruka") {
      return text.length >= 10 && text.length <= 4000 ? "" : messages.poruka;
    }
    return "";
  };

  var showError = function (field, message) {
    var wrap = field.closest(".field");
    var error = wrap.querySelector(".field-error");
    if (!message) {
      field.removeAttribute("aria-invalid");
      field.removeAttribute("aria-describedby");
      if (error) {
        error.remove();
      }
      return;
    }
    if (!error) {
      error = document.createElement("p");
      error.className = "field-error";
      error.id = field.name + "-greska";
      wrap.appendChild(error);
    }
    error.textContent = message;
    field.setAttribute("aria-invalid", "true");
    field.setAttribute("aria-describedby", error.id);
  };

  form.addEventListener("submit", function (event) {
    var firstInvalid = null;
    ["ime", "email", "telefon", "poruka"].forEach(function (name) {
      var field = form.elements[name];
      var message = validate(name, field.value);
      showError(field, message);
      if (message && !firstInvalid) {
        firstInvalid = field;
      }
    });
    if (firstInvalid) {
      event.preventDefault();
      firstInvalid.focus();
      return;
    }
    form.querySelector('[type="submit"]').setAttribute("disabled", "disabled");
  });
})();
