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
    slidesPerView: 1.4,
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
    slidesPerView: 1.2,
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
    slidesPerView: 1.2,
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
        slidesPerView: 2.5,
        spaceBetween: 20,
      },
      1440: {
        slidesPerView: 3.5,
        spaceBetween: 20,
      }
    }
  });
}

/* Article TOC */
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

document.addEventListener('DOMContentLoaded', function () {
  const playButton = document.getElementById('play-button');

  if (!playButton) return;

  const videoContainer = document.getElementById('video-container');
  const videoCodeContainer = document.getElementById('video-code');

  playButton.addEventListener('click', function () {
      let videoCode = videoCodeContainer.innerHTML;

      videoCode = videoCode.replace(/src="([^"]+)"/, function (match, url) {
          const separator = url.includes('?') ? '&' : '?';
          return `src="${url}${separator}autoplay=1"`;
      });

      videoContainer.innerHTML = videoCode;
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const slideWrappers = document.querySelectorAll(".reviews__comparison");

  slideWrappers.forEach(wrapper => {
    const images = wrapper.querySelectorAll(".reviews__comparison-img");
    const leftIcon = wrapper.querySelector(".angle-left-icon");
    const rightIcon = wrapper.querySelector(".angle-right-icon");
    const label = wrapper.querySelector(".reviews__comparison-label");

    let activeIndex = 0;

    const updateIcons = () => {
      leftIcon.classList.toggle("disabled", activeIndex === 0);
      rightIcon.classList.toggle("disabled", activeIndex === images.length - 1);

      if (activeIndex === 0) {
        label.textContent = "До";
      } else if (activeIndex === images.length - 1) {
        label.textContent = "После";
      } else {
        label.textContent = activeIndex % 2 === 0 ? "До" : "После";
      }
    };

    const switchImage = (direction) => {
      const currentImage = images[activeIndex];
      currentImage.classList.remove("reviews__comparison-img--active");

      if (direction === -1) {
        currentImage.classList.add("reviews__comparison-img--prev");
      } else {
        currentImage.classList.add("reviews__comparison-img--next");
      }

      activeIndex += direction;

      const nextImage = images[activeIndex];
      nextImage.classList.remove(
        "reviews__comparison-img--prev",
        "reviews__comparison-img--next"
      );

      nextImage.classList.add("reviews__comparison-img--active");

      updateIcons();
    };

    leftIcon.addEventListener("click", () => switchImage(-1));
    rightIcon.addEventListener("click", () => switchImage(1));

    updateIcons();
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const moreLink = document.querySelector('.seo__more-link');

  if (!moreLink) return;

  const seoText = document.querySelector('.seo__text');
  const arrowIcon = document.querySelector('.seo .arrow-right');

  function isMobile() {
      return window.innerWidth <= 768;
  }

  function truncateText() {
      if (!isMobile()) return;
      const paragraphs = seoText.querySelectorAll('p');
      paragraphs.forEach((paragraph, index) => {
          if (index > 2) {
              paragraph.style.display = 'none';
          }
      });
      arrowIcon.classList.remove('collapse');
  }

  function expandText() {
      if (!isMobile()) return;
      const paragraphs = seoText.querySelectorAll('p');
      paragraphs.forEach(paragraph => {
          paragraph.style.display = 'block';
      });
      arrowIcon.classList.add('collapse');
  }

  truncateText();

  moreLink.addEventListener('click', function (event) {
      event.preventDefault();

      if (!isMobile()) return;

      if (moreLink.textContent.trim() === 'Розгорнути весь список') {
          expandText();
          moreLink.textContent = 'Згорнути весь список';
      } else {
          truncateText();
          moreLink.textContent = 'Розгорнути весь список';
      }
  });

  window.addEventListener('resize', truncateText);
});

const setupMobileMenu = () => {
  const menu = document.querySelector(".header__nav");
  const menuSub = document.querySelector(".header__nav-subnav");
  const menuBtn = document.querySelector(".burger-menu");
  const menuPhone = document.querySelector(".header__phones");
  const menuLinks = document.querySelectorAll(".header__nav-link");
  const body = document.body;

  const handleMenuToggle = () => {
    if (menu.classList.contains("subactive")) {
      menu.classList.remove("subactive");
    }

    if (menuSub.classList.contains("subactive")) {
      menuSub.classList.remove("subactive");
    }

    menu.classList.toggle("active");
    menuBtn.classList.toggle("active");
    menuPhone.classList.toggle("active");
    body.classList.toggle("lock");
  };

  const handleMenuLinkClick = (event) => {
    const isServicesLink = event.target.classList.contains("header__nav-link--services");

    if (!isServicesLink && menuBtn.classList.contains("active")) {
      menu.classList.remove("active");
      menuBtn.classList.remove("active");
      menuPhone.classList.remove("active");
      body.classList.remove("lock");
    }
  };

  if (window.innerWidth < 1024) {
    if (menu && menuBtn) {
      menuBtn.addEventListener("click", handleMenuToggle);

      menuLinks.forEach((menuLink) => {
        menuLink.addEventListener("click", handleMenuLinkClick);
      });
    }
  } else {
    if (menu && menuBtn) {
      menuBtn.removeEventListener("click", handleMenuToggle);

      menuLinks.forEach((menuLink) => {
        menuLink.removeEventListener("click", handleMenuLinkClick);
      });
    }
    menu?.classList.remove("active");
    menuBtn?.classList.remove("active");
    menuPhone?.classList.remove("active");
    body.classList.remove("lock");
  }
};


window.addEventListener("resize", setupMobileMenu);

setupMobileMenu();

document.addEventListener('DOMContentLoaded', () => {
  const listWrapper = document.querySelector('.price__list-wrapper');

  if (!listWrapper) return;

  const list = listWrapper.querySelector('.price__list');
  const items = list.querySelectorAll('.price__item');
  const toggleButton = listWrapper.querySelector('.section-more__link');

  const maxVisibleItems = 5;

  const updateListState = () => {
      const isExpanded = toggleButton.dataset.expanded === 'true';

      items.forEach((item, index) => {
          if (index < maxVisibleItems || isExpanded) {
              item.style.display = 'block';
          } else {
              item.style.display = 'none';
          }
      });

      toggleButton.textContent = isExpanded ? 'Згорнути весь список' : 'Розгорнути весь список';
  };

  toggleButton.dataset.expanded = 'false';
  updateListState();

  toggleButton.addEventListener('click', (event) => {
      event.preventDefault();

      toggleButton.dataset.expanded = toggleButton.dataset.expanded === 'true' ? 'false' : 'true';

      updateListState();
  });
});

Fancybox.bind('[data-fancybox="gallery"]', {
  // Your custom options for a specific gallery
});

function moveElementOnScreenSize() {
  const subNav = document.querySelector('.header__nav-subnav');
  const targetContainer = document.querySelector('.header__inner--bottom');
  const originalParent = document.querySelector('.header__nav-item--services');

  if (!subNav || !targetContainer || !originalParent) return;

  if (window.innerWidth < 1024) {
      if (subNav.parentElement !== targetContainer) {
          targetContainer.appendChild(subNav);
      }
  } else {
      if (subNav.parentElement !== originalParent) {
          originalParent.appendChild(subNav);
      }
  }
}

window.addEventListener('resize', moveElementOnScreenSize);
document.addEventListener('DOMContentLoaded', moveElementOnScreenSize);

document.addEventListener("DOMContentLoaded", () => {
  const servicesLink = document.querySelector(".header__nav-link--services");
  const navBlock = document.querySelector(".header__nav");
  const subNavBlock = document.querySelector(".header__nav-subnav");

  if (!servicesLink || !navBlock || !subNavBlock) return;

  servicesLink.addEventListener("click", (event) => {
    event.preventDefault();

    if (window.innerWidth < 1024) {
      navBlock.classList.toggle("subactive");
      subNavBlock.classList.toggle("subactive");
    }
  });
});

document.addEventListener('DOMContentLoaded', () => {
  const phonesElement = document.querySelector('.header__phones');
  const navElement = document.querySelector('.header__nav');

  if (!phonesElement || !navElement) return;

  if (window.innerWidth < 1024) {
    navElement.appendChild(phonesElement);
  }
});

document.querySelectorAll('.accordion__header').forEach(button => {
  button.addEventListener('click', () => {
    const content = document.getElementById(button.getAttribute('aria-controls'));

    const isExpanded = button.getAttribute('aria-expanded') === 'true';
    button.setAttribute('aria-expanded', !isExpanded);
    content.setAttribute('aria-hidden', isExpanded);

    if (isExpanded) {
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + 'px';
    }
  });
});

document.addEventListener('DOMContentLoaded', () => {
  const plusPrimaryIcon = document.querySelector('.plus-leaders-primary-icon');
  const quotesPrimaryIcon = document.querySelector('.quotes-leaders-primary-icon');
  const closePrimaryIcon = document.querySelector('.close-leaders-primary-icon');
  const overlayPrimary = document.querySelector('.leaders__overlay--left');

  const plusSecondaryIcon = document.querySelector('.plus-leaders-secondary-icon');
  const quotesSecondaryIcon = document.querySelector('.quotes-leaders-secodary-icon');
  const closeSecondaryIcon = document.querySelector('.close-leaders-secondary-icon');
  const overlaySecondary = document.querySelector('.leaders__overlay--right');

  plusPrimaryIcon.addEventListener('click', () => {
      plusPrimaryIcon.classList.add('hidden');
      quotesPrimaryIcon.classList.remove('hidden');
      closePrimaryIcon.classList.remove('hidden');
      overlayPrimary.style.backgroundImage = "url('/wp-content/themes/prozheiko/assets/img/leaders-overlay-left.svg')";
  });

  closePrimaryIcon.addEventListener('click', () => {
      plusPrimaryIcon.classList.remove('hidden');
      quotesPrimaryIcon.classList.add('hidden');
      closePrimaryIcon.classList.add('hidden');
      overlayPrimary.style.backgroundImage = "none";
  });

  plusSecondaryIcon.addEventListener('click', () => {
      plusSecondaryIcon.classList.add('hidden');
      quotesSecondaryIcon.classList.remove('hidden');
      closeSecondaryIcon.classList.remove('hidden');
      overlaySecondary.style.backgroundImage = "url('/wp-content/themes/prozheiko/assets/img/leaders-overlay-right.svg')";
  });

  closeSecondaryIcon.addEventListener('click', () => {
      plusSecondaryIcon.classList.remove('hidden');
      quotesSecondaryIcon.classList.add('hidden');
      closeSecondaryIcon.classList.add('hidden');
      overlaySecondary.style.backgroundImage = "none";
  });
});



