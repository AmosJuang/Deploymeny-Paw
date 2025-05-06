document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.counter-number');
    let hasAnimated = false;
  
    const animateCounter = (counter) => {
      const target = +counter.getAttribute('data-target');
      const speed = 400;
      const increment = Math.ceil(target / speed);
  
      const updateCount = () => {
        const current = +counter.innerText.replace(/,/g, '');
        if (current < target) {
          counter.innerText = Math.min(target, current + increment).toLocaleString();
          setTimeout(updateCount, 20);
        } else {
          counter.innerText = target.toLocaleString() +'+';
        }
      };
  
      updateCount();
    };
  
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting && !hasAnimated) {
          counters.forEach(animateCounter);
          hasAnimated = true;
        }
      });
    }, { threshold: 0.4 });
  
    counters.forEach(counter => observer.observe(counter));

    const highlights = [
        {
          text: "Scholarship Fair 2025",
          desc: "Bergabung dalam acara tahunan yang mempertemukan kamu dengan berbagai penyedia beasiswa global.",
          image: "/images/highlight1.png"
        },
        {
          text: "Webinar Beasiswa Global",
          desc: "Ikuti sesi daring untuk mengupas strategi sukses dalam mencari beasiswa luar negeri.",
          image: "/images/highlight2.png"
        },
        {
          text: "Sesi Mentoring Bareng Alumni",
          desc: "Langsung ngobrol dan dapatkan tips bersama alumni dari universitas luar negeri yang siap bantu kamu.",
          image: "/images/highlight3.png"
        },
        {
          text: "Bikin CV Keren Bareng Expert",
          desc: "Pelajari langsung dari expert-expert dunia kerja cara membuat CV yang memikat penyedia beasiswa.",
          image: "/images/highlight4.png"
        }
      ];
      
      let currentHighlight = 0;
      const textEl = document.getElementById("highlight-text");
      const descEl = document.getElementById("highlight-desc");
      const imageEl = document.getElementById("highlight-image");
      
      function fadeOut(el, callback) {
        let opacity = 1;
        function animate() {
          opacity -= 0.05;
          el.style.opacity = opacity;
          if (opacity <= 0) {
            if (callback) callback();
          } else {
            requestAnimationFrame(animate);
          }
        }
        animate();
      }
      
      function fadeIn(el) {
        let opacity = 0;
        el.style.opacity = 0;
        function animate() {
          opacity += 0.05;
          el.style.opacity = opacity;
          if (opacity < 1) {
            requestAnimationFrame(animate);
          }
        }
        animate();
      }
      
      setInterval(() => {
        const next = (currentHighlight + 1) % highlights.length;
      
        fadeOut(textEl, () => {
          textEl.textContent = highlights[next].text;
          fadeIn(textEl);
        });
      
        fadeOut(descEl, () => {
          descEl.textContent = highlights[next].desc;
          fadeIn(descEl);
        });
      
        fadeOut(imageEl, () => {
          imageEl.src = highlights[next].image;
          fadeIn(imageEl);
        });
      
        currentHighlight = next;
      }, 4000);
});
