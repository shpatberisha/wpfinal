/**
 * Navigation JavaScript
 * Handles mobile menu toggle
 */

;(() => {
  // Mobile menu toggle
  const menuToggle = document.querySelector(".menu-toggle")
  const navigation = document.querySelector(".main-navigation")

  if (menuToggle && navigation) {
    menuToggle.addEventListener("click", () => {
      const isExpanded = menuToggle.getAttribute("aria-expanded") === "true"

      menuToggle.setAttribute("aria-expanded", !isExpanded)
      navigation.classList.toggle("toggled")
    })
  }

  // Close mobile menu when clicking outside
  document.addEventListener("click", (event) => {
    if (!navigation || !menuToggle) return

    const isClickInside = navigation.contains(event.target) || menuToggle.contains(event.target)

    if (!isClickInside && navigation.classList.contains("toggled")) {
      navigation.classList.remove("toggled")
      menuToggle.setAttribute("aria-expanded", "false")
    }
  })

  // Handle submenu accessibility
  const menuItems = document.querySelectorAll(".main-navigation .menu-item-has-children")

  menuItems.forEach((item) => {
    const link = item.querySelector("a")

    if (link) {
      link.addEventListener("focus", () => {
        item.classList.add("focus")
      })

      link.addEventListener("blur", () => {
        item.classList.remove("focus")
      })
    }
  })

  // Smooth scroll for anchor links
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      const href = this.getAttribute("href")

      if (href === "#") return

      const target = document.querySelector(href)

      if (target) {
        e.preventDefault()
        target.scrollIntoView({
          behavior: "smooth",
          block: "start",
        })
      }
    })
  })
})()
