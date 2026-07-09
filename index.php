<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="shortcut icon"
      href="./assets/logo.png"
      type="image/x-icon"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="../LibraryManagementSystem/frontend/css/index.css"
    />
    <title>Library Management System</title>
  </head>
  <body>
    <header>
      <section id="lms-header-logo">
        <img src="./assets/logo.png" alt="lms-logo" />
      </section>
      <nav>
        <li><a href="">Home</a></li>
        <li><a href="">About us</a></li>
        <li><a href="">Contact</a></li>
        <li><a href="">FAQS</a></li>
      </nav>
      <section id="auth-section">
        <button onclick="navigate()">Login</button>
      </section>
    </header>
    <section id="hero-section">
      <div id="hero-section-info">
        <h1 id="lms-header-title">Library Management System</h1>
        <em id="lms-header-subtitle">
          Empowering Learning Through Smart Library Management
        </em>
      </div>
      <div id="scroll-to-botton">
        <i class="ri-scroll-to-bottom-fill"></i>
        <p>Scroll to explore</p>
      </div>
    </section>

    <section id="lms-milestone-container">
      <div id="lms-milestone">
        <div id="lms-milestone-left">
          <div id="lms-milestone-innerleft">
            <div class="record-member">
              <div id="book-records" class="records">
                <h2><i class="ri-book-open-line"></i>&nbsp;10,000+</h2>
                <p class="records-topic">Smart Book Management</p>
              </div>
              <p>
                Organize and manage thousands of books with quick search,
                category filters, and easy record tracking.
              </p>
            </div>
            <div class="record-member">
              <div id="member-records" class="records">
                <h2><i class="ri-user-line"></i>&nbsp;5,000+</h2>
                <p class="records-topic">Efficient User Management</p>
              </div>
              <p>
                Store student and staff records securely while managing
                borrowing history and membership details.
              </p>
            </div>
          </div>
          <div id="lms-milestone-innerright">
            <div id="manage">
              <h2>Manage</h2>
              <img
                src="./assets/manage.png"
                alt="our users"
                height="30"
                style="user-select: none; pointer-events: none"
              />
            </div>
            <div id="your">
              <h2>Your</h2>
              <button>
                <i class="ri-arrow-right-long-line"></i>
              </button>
            </div>
            <h2>Library Smarter</h2>
            <h2>System Unlock for</h2>
            <h2>Organize. Track. Access</h2>
            <img
              src="./assets/growth.png"
              alt="growth"
              id="growth"
              width="200"
            />
          </div>
        </div>
        <div id="lms-milestone-right">
          <video autoplay muted loop>
            <source src="./assets/milestonevideo.mp4" type="video/mp4" />
            Your browser does not support the video tag.
          </video>
          <h2 id="lms-milestone-right-header">
            Read <br />
            Beyond.
          </h2>
          <button id="lms-milestone-right-intouch">
            <p onclick="location.href = './frontend/Auth/register.php'">
              Explore System
            </p>
            <i class="ri-arrow-right-long-line"></i>
          </button>
        </div>
      </div>
    </section>

    <section id="feedback-section">
      <img
        src="./assets/left.png"
        alt="pillar-left"
        id="pillar-left"
        class="pillar"
      />
      <img
        src="./assets/right.png"
        alt="pillar-right"
        id="pillar-right"
        class="pillar"
      />
      <div id="feedback-section-header">
        <button>
          HEAR FROM OUR USERS
          <div id="rt"></div>
          <div id="lt"></div>
          <div id="rb"></div>
          <div id="lb"></div>
        </button>
        <h2>
          We build smarter ways to<br />
          access and manage knowledge.
        </h2>
      </div>
      <div id="feedback-review">
        <div class="feedback-card">
          <div class="user-info">
            <img src="https://i.pravatar.cc/80?img=5" alt="user" />
            <div>
              <h3>Emma Wilson</h3>
              <p>Teacher</p>
            </div>
          </div>
          <div class="rating">⭐⭐⭐⭐<span class="half-star">⭐</span></div>
          <p class="feedback-text">
            Organizing and tracking books has become much easier with this
            system.
          </p>
        </div>

        <div class="feedback-card">
          <div class="user-info">
            <img src="https://i.pravatar.cc/80?img=8" alt="user" />
            <div>
              <h3>John Carter</h3>
              <p>Student</p>
            </div>
          </div>
          <div class="rating">⭐⭐⭐⭐⭐</div>
          <p class="feedback-text">
            The library system helped me access books quickly and improved my
            study routine.
          </p>
        </div>

        <div class="feedback-card">
          <div class="user-info">
            <img src="https://i.pravatar.cc/80?img=4" alt="user" />
            <div>
              <h3>Michael Brown</h3>
              <p>Student</p>
            </div>
          </div>
          <div class="rating">⭐⭐⭐⭐⭐</div>
          <p class="feedback-text">
            I love how easy it is to search for books and manage my borrowing
            history.
          </p>
        </div>

        <div class="feedback-card">
          <div class="user-info">
            <img src="https://i.pravatar.cc/80?img=10" alt="user" />
            <div>
              <h3>Sophia Miller</h3>
              <p>Teacher</p>
            </div>
          </div>
          <div class="rating">⭐⭐⭐⭐</div>
          <p class="feedback-text">
            This platform makes book management faster and keeps everything
            organized.
          </p>
        </div>

        <div class="feedback-card">
          <div class="user-info">
            <img src="https://i.pravatar.cc/80?img=16" alt="user" />
            <div>
              <h3>Olivia Taylor</h3>
              <p>Researcher</p>
            </div>
          </div>
          <div class="rating">⭐⭐⭐⭐⭐</div>
          <p class="feedback-text">
            Finding reference materials has become much more convenient and
            efficient.
          </p>
        </div>

        <div class="feedback-card">
          <div class="user-info">
            <img src="https://i.pravatar.cc/80?img=12" alt="user" />
            <div>
              <h3>Daniel Anderson</h3>
              <p>Student</p>
            </div>
          </div>
          <div class="rating">⭐⭐⭐⭐<span class="half-star">⭐</span></div>
          <p class="feedback-text">
            The availability feature is very helpful for checking books before
            visiting.
          </p>
        </div>
      </div>
    </section>

    <section id="comparision">
      <div id="comparision-section-header">
        <button>
          COMPARISON
          <div id="rt"></div>
          <div id="lt"></div>
          <div id="rb"></div>
          <div id="lb"></div>
        </button>

        <h2>
          What Makes Our Library <br />
          Management System Better?
        </h2>
      </div>

      <section id="comparison-section">
        <div class="comparison-container">
          <div class="comparison-card comparison-card--primary">
            <div class="comparison-header">
              <img
                src="./assets/logo.png"
                alt="Library Logo"
                class="comparison-logo"
              />
            </div>

            <ul class="comparison-list">
              <li class="comparison-item positive">
                <i class="ri-checkbox-circle-line"></i>
                Centralized Book Record Management
              </li>

              <li class="comparison-item positive">
                <i class="ri-checkbox-circle-line"></i>
                Quick Search by Title, Author & Category
              </li>

              <li class="comparison-item positive">
                <i class="ri-checkbox-circle-line"></i>
                Efficient Borrow & Return Record Tracking
              </li>

              <li class="comparison-item positive">
                <i class="ri-checkbox-circle-line"></i>
                Secure User & Admin Authentication
              </li>

              <li class="comparison-item positive">
                <i class="ri-checkbox-circle-line"></i>
                Faster Data Retrieval & Report Generation
              </li>
            </ul>
          </div>

          <div class="comparison-card comparison-card--secondary">
            <div class="comparison-header">
              <h3 class="comparison-title">
                <i class="ri-stack-fill"></i> Traditional System
              </h3>
            </div>
            <br /><br /><br />

            <ul class="comparison-list">
              <li class="comparison-item negative">
                <i class="ri-close-circle-line"></i>
                Manual Paper-Based Record Keeping
              </li>

              <li class="comparison-item negative">
                <i class="ri-close-circle-line"></i>
                Slow Book Search Process
              </li>

              <li class="comparison-item negative">
                <i class="ri-close-circle-line"></i>
                Manual Borrow & Return Tracking
              </li>

              <li class="comparison-item negative">
                <i class="ri-close-circle-line"></i>
                Higher Risk of Data Errors & Lost Records
              </li>

              <li class="comparison-item negative">
                <i class="ri-close-circle-line"></i>
                Time-Consuming Report Preparation
              </li>
            </ul>
          </div>
        </div>
      </section>
    </section>

    <section id="project-team">
      <div id="team-section-header">
        <button>
          PROJECT TEAM
          <div id="rt"></div>
          <div id="lt"></div>
          <div id="rb"></div>
          <div id="lb"></div>
        </button>

        <h2>
          Meet the Dedicated Team <br />
          Behind This Project.
        </h2>
      </div>

      <div id="card">
        <div class="profile">
          <img
            class="logo"
            src="https://github.com/Bibidh-Raj-Shrestha.png"
            alt="bibidh's profile"
          />
          <h1>Bibidh Raj Shrestha</h1>
          <p class="occupation">Frontend / Backend</p>
          <div class="icons">
            <a
              href="https://www.facebook.com/bibidhrajshrestha17"
              target="_blank"
              ><i class="ri-facebook-fill"></i
            ></a>
            <a href="https://github.com/Bibidh-Raj-Shrestha" target="_blank"
              ><i class="ri-github-fill"></i
            ></a>
            <a
              href="https://www.linkedin.com/in/bibidh-raj-shrestha-0a559a328/"
              target="_blank"
              ><i class="ri-linkedin-box-fill"></i
            ></a>
            <a
              href="https://www.instagram.com/bibidhrajshrestha/"
              target="_blank"
              ><i class="ri-instagram-fill"></i
            ></a>
          </div>
        </div>

        <div class="profile">
          <img
            class="logo"
            src="https://github.com/pragyanrajbhandari.png"
            alt="pragyan's profile"
          />
          <h1>Pragyan Rajbhandari</h1>
          <p class="occupation">Frontend / Backend</p>
          <div class="icons">
            <a
              href="https://www.facebook.com/pragyan.rajbhandari.3/"
              target="_blank"
              ><i class="ri-facebook-fill"></i
            ></a>
            <a href="https://github.com/pragyanrajbhandari" target="_blank"
              ><i class="ri-github-fill"></i
            ></a>
            <a
              href="https://www.linkedin.com/in/pragyanrajbhandari/"
              target="_blank"
              ><i class="ri-linkedin-box-fill"></i
            ></a>
            <a
              href="https://www.instagram.com/rajbhandaripragyan/"
              target="_blank"
              ><i class="ri-instagram-fill"></i
            ></a>
          </div>
        </div>

        <div class="profile">
          <img
            class="logo"
            src="https://github.com/nischalshrestha0011.png"
            alt="nischal's profile"
          />
          <h1>Nischal Shrestha</h1>
          <p class="occupation">Frontend / Backend</p>
          <div class="icons">
            <a
              href="https://www.facebook.com/nischal.shrestha.487598?rdid=OovdQ6Pbr7IanVP9&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F1Rhu6XEFhV%2F#"
              target="_blank"
              ><i class="ri-facebook-fill"></i
            ></a>
            <a href="https://github.com/nischalshrestha0011" target="_blank"
              ><i class="ri-github-fill"></i
            ></a>
            <a
              href="https://www.linkedin.com/in/nischal-shrestha-376280421/"
              target="_blank"
              ><i class="ri-linkedin-box-fill"></i
            ></a>
            <a
              href="https://www.instagram.com/onlyk_aji?igsh=ejFjanF0bGl1c2pk"
              target="_blank"
              ><i class="ri-instagram-fill"></i
            ></a>
          </div>
        </div>

        <div class="profile">
          <img
            class="logo"
            src="https://github.com/anujghimire08.png"
            alt="Anuj's profile"
          />
          <h1>Anuj Ghimire</h1>
          <p class="occupation">Frontend / Backend</p>
          <div class="icons">
            <a href="https://www.facebook.com/anujghimire08" target="_blank"
              ><i class="ri-facebook-fill"></i
            ></a>
            <a href="https://github.com/anujghimire08" target="_blank"
              ><i class="ri-github-fill"></i
            ></a>
            <a href="https://www.linkedin.com/in/anujghimire08/" target="_blank"
              ><i class="ri-linkedin-box-fill"></i
            ></a>
            <a href="https://www.instagram.com/anujghimire08" target="_blank"
              ><i class="ri-instagram-fill"></i
            ></a>
          </div>
        </div>
      </div>
    </section>

    <footer id="site-footer">
      <div class="footer-container">
        <div class="footer-column footer-about">
          <img src="./assets/logo.png" alt="Library Logo" class="footer-logo" />

          <p class="footer-description">
            A centralized Library Management System for secure storage,
            organization, and retrieval of library records and resources.
          </p>
        </div>

        <div class="footer-column footer-team">
          <h3 class="footer-title">Team</h3>

          <p>Bibidh Raj Shrestha</p>
          <p>Anuj Ghimire</p>
          <p>Pragyan RajBhandari</p>
          <p>Nischal Shrestha</p>

          <p class="footer-email">library12@gmail.com</p>
          <p class="footer-phone">+977-9804356535</p>
        </div>

        <div class="footer-column footer-links">
          <h3 class="footer-title">Privacy</h3>

          <ul class="footer-list">
            <li><a href="#">Terms of Use</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Security Tips</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="#">Report Misuse</a></li>
          </ul>
        </div>

        <div class="footer-column footer-newsletter">
          <h3 class="footer-title">Newsletter</h3>

          <form class="newsletter-form">
            <input
              type="email"
              class="newsletter-input"
              placeholder="Enter your email"
            />

            <button type="submit" class="newsletter-submit">Submit</button>
          </form>

          <div class="footer-socials">
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-square-x-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-youtube"></i></a>
            <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
          </div>
        </div>
      </div>

      <hr class="footer-divider" />

      <p class="footer-copyright">
        © 2026 Library Management System. All rights reserved.
      </p>
    </footer>

    <script>
      const scroll = document.querySelector("#scroll-to-botton");
      function blink() {
        setInterval(() => {
          scroll.style.opacity = scroll.style.opacity === "1" ? "0" : "1";
        }, 1000);
      }
      blink();
      function navigate() {
        window.location.href = "./frontend/Auth/login.php";
      }
    </script>
  </body>
</html>
