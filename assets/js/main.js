document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.tabs__button');
    const panels = document.querySelectorAll('.tabs__panel');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            buttons.forEach(btn => btn.classList.remove('tabs__button--active'));
            panels.forEach(panel => panel.classList.remove('tabs__panel--active'));

            button.classList.add('tabs__button--active');
            const target = button.getAttribute('data-tab');
            document.getElementById(target).classList.add('tabs__panel--active');
        });
    });
});

if (typeof Swiper !== 'undefined') {
  const reviewsSlider = new Swiper('.reviews__slider', {
    slidesPerView: 1,
    spaceBetween: 20,
    navigation: {
      prevEl: '.swiper-button-prev',
      nextEl: '.swiper-button-next',
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      renderBullet: (index, className) => {
        const number = (index + 1).toString().padStart(2, '0');
        return `<span class="${className}">${number}</span>`;
      },
    },
    breakpoints: {
      768: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
      1200: {
        slidesPerView: 4,
        spaceBetween: 20,
      }
    }
  });

  const stepsSlider = new Swiper('.steps__slider', {
    slidesPerView: 1,
    spaceBetween: 20,
    navigation: {
      prevEl: '.swiper-button-prev',
      nextEl: '.swiper-button-next',
    },
    breakpoints: {
      768: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
      1200: {
        slidesPerView: 4,
        spaceBetween: 20,
      }
    }
  });

  const doctorsSlider = new Swiper('.doctors__slider', {
    slidesPerView: 1,
    spaceBetween: 20,
    navigation: {
      prevEl: '.swiper-button-prev',
      nextEl: '.swiper-button-next',
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      renderBullet: (index, className) => {
        const number = (index + 1).toString().padStart(2, '0');
        return `<span class="${className}">${number}</span>`;
      },
    },
  });

  const certificateSlider = new Swiper('.certificates__slider', {
    slidesPerView: 3,
    spaceBetween: 20,
    navigation: {
      prevEl: '.swiper-button-prev',
      nextEl: '.swiper-button-next',
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      renderBullet: (index, className) => {
        const number = (index + 1).toString().padStart(2, '0');
        return `<span class="${className}">${number}</span>`;
      },
    },
  });
}

// document.addEventListener('DOMContentLoaded', () => {
//   const menuItem = document.querySelector('.header__nav-item--services');
//   const subNav = document.querySelector('.header__nav-subnav');

//   if (menuItem && subNav) {
//       // Функция для добавления класса
//       const showSubNav = () => {
//           subNav.classList.add('active');
//       };

//       // Функция для удаления класса
//       const hideSubNav = (event) => {
//           const relatedTarget = event.relatedTarget; // Куда переместился курсор
//           if (!menuItem.contains(relatedTarget) && !subNav.contains(relatedTarget)) {
//               subNav.classList.remove('active');
//           }
//       };

//       // Добавление событий
//       menuItem.addEventListener('mouseenter', showSubNav);
//       menuItem.addEventListener('mouseleave', hideSubNav);
//       subNav.addEventListener('mouseenter', showSubNav);
//       subNav.addEventListener('mouseleave', hideSubNav);
//   }
// });

document.addEventListener("DOMContentLoaded", () => {
  const articleContent = document.querySelector(".article__content");
  const articleTOC = document.querySelector(".article__toc");

  if (articleContent && articleTOC) {
      const headings = articleContent.querySelectorAll("h2");

      let counter = 1;

      headings.forEach(heading => {
          const li = document.createElement("li");
          li.className = "article__toc-item";

          const anchor = document.createElement("a");
          anchor.className = "article__toc-link";
          anchor.textContent = heading.textContent;

          const id = `heading-${counter++}`;
          heading.id = id;
          anchor.href = `#${id}`;

          li.appendChild(anchor);
          articleTOC.appendChild(li);
      });
  }
});

/* Popup */
const popupLinks = document.querySelectorAll('.popup-link');
const body = document.querySelector('body');
const lockPadding = document.querySelectorAll('.lock-padding');

let unlock = true;

const timeout = 800;

if (popupLinks.length > 0) {
    for (let i = 0; i < popupLinks.length; i++) {
        const popupLink = popupLinks[i];
        popupLink.addEventListener("click", function(e) {
            const popupName = popupLink.getAttribute("data-popup");
            const currentPopup = document.getElementById(popupName);
            popupOpen(currentPopup);
            e.preventDefault();
        });
    }
}

const popupCloseIcon = document.querySelectorAll('.close-popup');
if (popupCloseIcon.length > 0) {
    for (let i = 0; i < popupCloseIcon.length; i++) {
        const el = popupCloseIcon[i];
        el.addEventListener("click", function(e) {
            popupClose(el.closest(".popup"));
            e.preventDefault();
        });
    }
}

function popupOpen(currentPopup) {
    if (currentPopup && unlock) {
        const popupActive = document.querySelector('.popup.open');
        if (popupActive) {
            popupClose(popupActive, false);
        } else {
            bodyLock();
        }
        currentPopup.classList.add('open');
        currentPopup.addEventListener("click", function(e) {
            if (!e.target.closest('.popup__content')) {
                popupClose(e.target.closest('.popup'));
            }
        });
    }
}

function popupClose(popupActive, doUnlock = true) {
    if (unlock) {
        popupActive.classList.remove('open');
        if (doUnlock) {
            bodyUnLock();
        }
    }
}

function bodyLock() {
  const lockPaddingValue = window.innerWidth - document.querySelector('.wrapper').offsetWidth + 'px';

  if (lockPadding.length > 0) {
      for (let i = 0; i < lockPadding.length; i++) {
          const el = lockPadding[i];
          el.style.paddingRight = lockPaddingValue;
      }
  }
  body.style.paddingRight = lockPaddingValue;
  body.classList.add('lock');

  unlock = false;
  setTimeout(function() {
      unlock = true;
  }, timeout);
}

function bodyUnLock() {
  setTimeout(function() {
      if (lockPadding.length > 0) {
          for (let i = 0; i < lockPadding.length; i++) {
              const el = lockPadding[i];
              el.style.paddingRight = '0px';
          }
      }
      body.style.paddingRight = '0px';
      body.classList.remove('lock');
  }, timeout);

  unlock = false;
  setTimeout(function() {
      unlock = true;
  }, timeout);
}

document.addEventListener("DOMContentLoaded", () => {
  const faqItems = document.querySelectorAll(".faq__item");

  faqItems.forEach(item => {
      const head = item.querySelector(".faq__item-head");
      const content = item.querySelector(".faq__item-content");
      const icon = item.querySelector(".angle-up-icon");

      content.style.maxHeight = "0";

      head.addEventListener("click", () => {
          const isActive = item.classList.contains("active");

          faqItems.forEach(i => {
              i.classList.remove("active");
              i.querySelector(".faq__item-content").style.maxHeight = "0";
              i.querySelector(".angle-up-icon").style.transform = "rotate(0deg)";
          });

          if (!isActive) {
              item.classList.add("active");
              content.style.maxHeight = content.scrollHeight + "px";
              icon.style.transform = "rotate(180deg)";
          }
      });
  });
});
