// Dynamiczne ładowanie kursów AJAX-em na stronie głównej
$(document).ready(function () {
  $.getJSON("api/courses.php", function (data) {
    const $list = $("#courses-list");
    $list.empty(); // usuń statyczny kafelek

    if (data.length === 0) {
      $list.append(
        '<div class="col-12"><div class="alert alert-warning">Brak kursów do wyświetlenia.</div></div>'
      );
    }

    data.forEach(function (course) {
      $list.append(`
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">${course.title}</h5>
                            <p class="card-text">${course.description}</p>
                            ${
                              course.featured == 1
                                ? '<span class="badge bg-success mb-2">Polecany</span>'
                                : ""
                            }
                            <p class="h5 mb-2">${
                              parseFloat(course.price) > 0
                                ? course.price + " zł"
                                : "Darmowy"
                            }</p>
                            <a href="course.php?id=${
                              course.id
                            }" class="btn btn-primary w-100">Szczegóły</a>
                        </div>
                    </div>
                </div>
            `);
    });
  });
});
$(function () {
  $.getJSON("api/user_courses.php", function (resp) {
    const $list = $("#user-courses-list");
    $list.empty();

    if (!resp.success) {
      $list.html(
        '<div class="alert alert-danger">Nie udało się pobrać kursów.</div>'
      );
      return;
    }

    if (!resp.courses.length) {
      $list.html(`
                <div class="col-12 text-center py-1">
                    <i class="bi bi-emoji-frown no-data-icon"></i>
                    <div class="mt-2 mb-2">Brak aktywnych kursów</div>
                    <a href="all-courses.php" class="glass-btn btn btn-sm px-4 py-2">
                        <i class="bi bi-plus-circle"></i> Dodaj kurs
                    </a>
                </div>
            `);
      return;
    }

    let html = '<div class="row g-4">';
    resp.courses.forEach(function (course) {
      html += `
            <div class="col-md-6 col-lg-4">
                <div class="card course-card h-100">
                    <div class="course-card-accent">
                        <span class="course-title-accent">${course.title}</span>
                        <i class="bi bi-journal-bookmark-fill course-icon"></i>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3">
                            <div class="progress" style="height: 20px;">
                                <div class="progress-bar" role="progressbar"
                                    style="width: ${course.progress}%">
                                    ${course.progress}%
                                </div>
                            </div>
                        </div>
                        ${
                          course.progress == 100
                            ? `<span class="badge bg-success mb-3 px-2">ukończony</span>
                               <a href="certificate.php?course_id=${course.id}" class="glass-btn btn w-100 btn-sm mt-auto">
                                    <i class="bi bi-award"></i> Pobierz certyfikat
                               </a>`
                            : `<span class="badge bg-primary mb-3 px-2">trwa</span>
                               <a href="learn.php?course_id=${course.id}" class="glass-btn btn w-100 btn-sm mt-auto">
                                    <i class="bi bi-play-circle"></i> Kontynuuj naukę
                               </a>`
                        }
                    </div>
                </div>
            </div>
            `;
    });
    html += "</div>";
    $list.html(html);
  });
});
