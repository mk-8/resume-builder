<?php
  include "auth_session.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Resume Generator</title>
    <!-- <link rel="stylesheet" href="index-style.css"> -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="form-style.css" />
    <style>
      .tag {
        position: fixed;
        top: 0;
        right: 0;
        width: 60px;
        height: 60px;
        background: #600ff6 url(menu.png);
        background-size: 30px;
        background-position: center;
        background-repeat: no-repeat;
        z-index: 20;
        cursor: pointer;
      }

      .tag.active {
        background: #1b206e url(close.png);
        background-size: 25px;
        background-position: center;
        background-repeat: no-repeat;
      }

      .navigation {
        position: fixed;
        top: 0;
        left: 100%;
        width: 100%;
        height: 100%;
        background-color: #fff;
        z-index: 15;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .navigation.active {
        left: 0;
      }

      .navigation ul {
        position: relative;
      }

      .navigation ul li {
        position: relative;
        list-style: none;
        text-align: center;
      }

      .navigation ul li a {
        font-size: 2.2rem;
        color: #111;
        text-decoration: none;
        font-weight: 300;
      }

      .navigation ul li a:hover {
        color: var(--primary-color);
      }

      .navigation .social-bar {
        position: absolute;
        top: 0;
        left: 0;
        width: 60px;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .navigation .social-bar a {
        display: inline-block;
        transform: scale(0.5);
      }

      .navigation .email-icon {
        position: absolute;
        bottom: 20px;
        transform: scale(0.5);
      }
    </style>
  </head>
  <body>
    <header>
      <div class="tag"></div>
      <div class="navigation">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="aboutus.html">Build Resume</a></li>
          <li><a href="aboutus.html">About us</a></li>
          <li><a href="logout.php">Log Out</a></li>

        </ul>
      </div>
    </header>

    <div class="container text-dark">
      <h1
        class="text-center my-5 fw-bold"
        style="color: #0a346b; font-size: 3rem"
      >
        Resume Form
      </h1>
      <div class="form-container">
        <form action="submit.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="token" value="HGsZOXpfNC" />
          <div class="p-3 mb-3">
            <h2>Profile Image</h2>
            <div class="mb-3">
              <label class="form-label"
                >Select a square image 1:1 (Recommended)</label
              >
              <input
                class="form-control"
                name="profile_image"
                type="file"
                required
              />
            </div>
          </div>
          <div class="p-3 mb-3">
            <h2>Contact</h2>
            <div class="d-flex justify-content-between mb-3">
              <div>
                <label class="form-label">First Name</label>
                <input
                  type="text"
                  name="first_name"
                  class="form-control"
                  required
                />
              </div>
              <div>
                <label class="form-label">Last Name</label>
                <input
                  type="text"
                  name="last_name"
                  class="form-control"
                  required
                />
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Profession</label>
              <input
                type="text"
                class="form-control"
                name="profession"
                required
              />
            </div>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" class="form-control" name="email" required />
              <div class="form-text text-light">
                We'll never share your email with anyone else.
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Phone number</label>
              <input
                type="tel"
                class="form-control"
                id="phone"
                name="phone"
                placeholder="0300-1234567"
                pattern="[0-9]{4}-[0-9]{7}"
                required
              />
            </div>
          </div>
          <div class="p-3 mb-3">
            <h2>Skills (Max:5)</h2>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label"
                >Skillset Name</label
              >
              <input type="text" class="form-control" name="skill1" required />
              <select class="form-select mt-2" name="skill_level1" required>
                <option value="">
                  Select stars based upon your skill level
                </option>
                <option value="1">1 - Novice</option>
                <option value="2">2 - Advanced Beginner</option>
                <option value="3">3 - Competent</option>
                <option value="4">4 - Proficient</option>
                <option value="5">5 - Expert</option>
              </select>
            </div>
            <div id="addSkill"></div>
            <div class="mb-3">
              <button
                type="button"
                id="skill_hide"
                class="btn btn-primary form-control"
                onclick="addSkill()"
                style="background-color: #007bff !important"
              >
                +
              </button>
            </div>
          </div>
          <div class="p-3 mb-3">
            <h2>Hobbies (Max:4)</h2>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Hobby</label>
              <input type="text" name="hobby1" class="form-control" required />
            </div>
            <div id="addHobby"></div>
            <div class="mb-3">
              <button
                type="button"
                id="hobby_hide"
                class="btn btn-primary form-control"
                onclick="addHobby()"
                style="background-color: #007bff !important"
              >
                +
              </button>
            </div>
          </div>
          <div class="p-3 mb-3">
            <h2>About Me</h2>
            <div class="form-floating">
              <textarea
                class="form-control"
                name="about_me"
                style="height: 100px"
                required
              ></textarea>
            </div>
          </div>
          <div class="p-3 mb-3">
            <h2>Education (Max:3)</h2>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label"
                >School/College/University</label
              >
              <input type="text" name="institute1" class="form-control" />
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label"
                >Degree Name</label
              >
              <input type="text" name="degree1" class="form-control" />
            </div>
            <div class="mb-3 d-flex justify-content-between">
              <div>
                <label for="exampleInputEmail1" class="form-label">From</label>
                <input type="text" name="from1" class="form-control" />
              </div>
              <div>
                <label for="exampleInputEmail1" class="form-label">To</label>
                <input type="text" name="to1" class="form-control" />
              </div>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label"
                >Grade/Score/CGPA</label
              >
              <input type="text" name="grade1" class="form-control" />
            </div>
            <div id="addEducation"></div>
            <div class="mb-3">
              <button
                type="button"
                id="education_hide"
                class="btn btn-primary form-control"
                onclick="addEducation()"
                style="background-color: #007bff !important"
              >
                +
              </button>
            </div>
          </div>
          <div class="p-3 mb-3">
            <h2>Experience (Max:3)</h2>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Title</label>
              <input type="text" name="title1" class="form-control" />
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label"
                >Description</label
              >
              <input type="text" name="description1" class="form-control" />
            </div>
            <div id="addExperience"></div>
            <div class="mb-3">
              <button
                type="button"
                id="experience_hide"
                class="btn btn-primary form-control"
                onclick="addExperience()"
                style="background-color: #007bff !important"
              >
                +
              </button>
            </div>
          </div>
          <!-- <input type="submit" class="form-control my-2"> -->
          <div class="text-center">
            <button
              type="submit"
              class="btn btn-success"
              style="background-color: #379237; border: none"
            >
              Submit

            </button>
            <br />
            <br />
          </div>
        </form>
        <!-- <br><br> -->
      </div>
    </div>
    <br /><br /><br /><br />
    <!-- <script src="script.js"></script> -->
    <script>
      const tag = document.querySelector(".tag");
      const navigation = document.querySelector(".navigation");

      tag.addEventListener("click", () => {
        tag.classList.toggle("active");
        navigation.classList.toggle("active");
      });
    </script>
    <script src="app.js"></script>
  </body>
</html>
