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

document.addEventListener('DOMContentLoaded', () => {
  const menuItem = document.querySelector('.header__nav-item--services');
  const subNav = document.querySelector('.header__nav-subnav');

  if (menuItem && subNav) {
      // Функция для добавления класса
      const showSubNav = () => {
          subNav.classList.add('active');
      };

      // Функция для удаления класса
      const hideSubNav = (event) => {
          const relatedTarget = event.relatedTarget; // Куда переместился курсор
          if (!menuItem.contains(relatedTarget) && !subNav.contains(relatedTarget)) {
              subNav.classList.remove('active');
          }
      };

      // Добавление событий
      menuItem.addEventListener('mouseenter', showSubNav);
      menuItem.addEventListener('mouseleave', hideSubNav);
      subNav.addEventListener('mouseenter', showSubNav);
      subNav.addEventListener('mouseleave', hideSubNav);
  }
});

document.addEventListener("DOMContentLoaded", () => {
  // Находим блок с классом .article__content
  const articleContent = document.querySelector(".article__content");
  // Находим блок с классом .article__toc
  const articleTOC = document.querySelector(".article__toc");

  if (articleContent && articleTOC) {
      // Находим все заголовки h2 внутри .article__content
      const headings = articleContent.querySelectorAll("h2");

      // Счетчик для уникальных ID
      let counter = 1;

      // Создаем список элементов для каждого заголовка
      headings.forEach(heading => {
          const li = document.createElement("li");
          li.className = "article__toc-item";

          const anchor = document.createElement("a");
          anchor.className = "article__toc-link";
          anchor.textContent = heading.textContent;

          // Генерируем уникальный ID
          const id = `heading-${counter++}`;
          heading.id = id;
          anchor.href = `#${id}`;

          li.appendChild(anchor);
          articleTOC.appendChild(li);
      });
  }
});
