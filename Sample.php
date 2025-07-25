<?php
// Database connection (adjust if already connected)
$host = 'localhost';
$dbname = 'library_db';
$username = 'root';
$password = '';
ini_set('session.cookie_lifetime', 0);

// Start the session
session_start();
$_SESSION['formSubmitted'] = true;

// Check if the user has already submitted the form
$formSubmitted = isset($_SESSION['form_submitted']) && $_SESSION['form_submitted'];

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch the latest 4 infographics
    $stmt = $conn->query("SELECT title_info, pdf_info, custom_title FROM infographics ORDER BY id DESC LIMIT 4");
    $latestInfographics = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "DB connection failed: " . $e->getMessage();
}

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="/img/psa logo.png">
        <title>Digital Library</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js"></script>
        <script src="script.js"></script>
        <link rel="stylesheet" href="style.css">

        <script>
        window.isUserRegistered = <?php echo isset($_SESSION['form_submitted']) && $_SESSION['form_submitted'] === true ? 'true' : 'false'; ?>;
        </script>

    </head>
    <body>
    <input type="hidden" id="formSubmitted" value="<?php echo $formSubmitted ? 'true' : 'false'; ?>">
        <!-- Popup Modal -->
    <div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="welcomeModalLabel">Welcome to PSA Digital Library</h5>
                <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
            </div>
            <div class="modal-body">
                <form action="save_form.php" method="POST" id="popupForm">
                <div class="row">
                    <div class="col-md-6">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" name="name" id="name" required placeholder="Enter your full name">
                    </div>
                    <div class="col-md-6">
                    <label for="grade" class="form-label">Educational Level / Job Title:</label>
                    <input type="text" class="form-control" name="grade_course" id="grade_course" required placeholder="Enter your grade or course or job title">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6">
                    <label for="age" class="form-label">Age:</label>
                    <input type="number" class="form-control" name="age" id="age" required placeholder="Enter your age">
                    </div>
                    <div class="col-md-6">
                    <label for="school" class="form-label">Institution / Company Name:</label>
                    <input type="text" class="form-control" name="school" id="school" required placeholder="Enter your school or company">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6">
                    <label for="sex" class="form-label">Sex:</label>
                    <select class="form-control" name="sex" id="sex" required>
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                        <option value="Pft">Prefer not to say</option>
                    </select>
                    </div>
                    <div class="col-md-6">
                    <label for="purpose" class="form-label">Purpose:</label>
                    <input type="text" class="form-control" name="purpose" id="purpose" required placeholder="Enter your purpose">
                    </div>
                </div>

                <hr class="mt-3">
                <h5>Data Privacy</h5>
                <p>By submitting this form, you agree to our <a href="#" data-bs-toggle="modal" data-bs-target="#privacyModal">Data Privacy Policy</a>.</p>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="privacy_policy_accepted" id="privacy_policy_accepted">
                    <label class="form-check-label" for="privacy_policy_accepted">
                    I agree to the Data Privacy Policy
                    </label>
                </div>

                <div class="mt-3 text-end"> 
                    <button type="button" class="btn btn-primary" id="confirmButton" disabled>Submit</button>
                </div>
                </form>
                <!--Disabled button function--> 
                </div>
            </div>
        </div>
    </div>

        <!-- Data Privacy Policy Modal -->
    <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="privacyModalLabel">Data Privacy Policy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
                <h2>Philippine Statistics Authority PSO - NCR V</h2>
                <p><strong>1. Introduction</strong></p>
                <p>The Philippine Statistics Authority – Provincial Statistical Office NCR V is a regional implementing unit mandated to generate and disseminate official statistics within its jurisdiction in Metro Manila. It ensures the efficient execution of statistical operations, civil registration services, and data quality assurance in accordance with national standards and protocols. PSO NCR V contributes significantly to evidence-based planning, policymaking, and governance through the production of reliable and timely statistical information.</p>

                <p><strong>2. Scope</strong></p>
                <p>The Philippine Statistics Authority – Provincial Statistical Office NCR V encompasses the full range of statistical and civil registration activities within the cities of Las Piñas, Muntinlupa, Parañaque, and Pasay. Its functions include the conduct of censuses and surveys, processing and validation of statistical data, civil registry document management, and support for sectoral statistics across economic, demographic, social, and environmental domains. The office also coordinates with local government units, national agencies, and other stakeholders to ensure the effective integration of statistical systems and the alignment of local data initiatives with national development goals.</p>

                <p><strong>3. Collection and Use of Personal Data</strong></p>
                <p>While the PSA may request your consent to process personal information, it may also do so without consent when such processing is mandated by law, particularly under Section 12 or 13 of the Data Privacy Act (DPA). In these cases, personal data may be used for addressing inquiries and document requests, soliciting feedback, providing updates, fulfilling legal obligations, and exercising public authority functions, including the protection of data privacy rights. Additionally, the PSA may collect other relevant personal data necessary to perform its mandate under RA No. 10625, RA No. 11315, RA No. 11055, and the PSA’s Citizens Charter.</p>

                <p><strong>4. Data Protection and Security</strong></p>
                <p>Personal data processed by the Philippine Statistics Authority (PSA) is treated with strict confidentiality and is not disclosed to any third party, in accordance with Republic Act No. 10625. Disclosure is permitted only when expressly allowed under Section 12 or Section 13 of the Data Privacy Act of 2012, ensuring compliance with lawful and legitimate processing grounds.</p>

                <p><strong>5. Data Sharing and Disclosure</strong></p>
                <p>Personal data processed by the Philippine Statistics Authority (PSA) is treated with strict confidentiality and is not disclosed to any third party, in accordance with Republic Act No. 10625. Disclosure is permitted only when expressly allowed under Section 12 or Section 13 of the Data Privacy Act of 2012, ensuring compliance with lawful and legitimate processing grounds.</p>

                <p><strong>6. Retention and Disposal</strong></p>
                <p>Personal information is stored in PSA-managed computers and servers within a secure environment, with the possible use of cloud-based third-party providers under strict data protection safeguards. Retention of data is governed by applicable laws and internal policies, ensuring that personal data is kept only for as long as necessary to fulfill its intended purpose. Upon the end of its retention period, physical records are securely shredded and digital files are anonymized or irreversibly deleted to prevent any unauthorized access, retrieval, or further processing.</p>

                <p><strong>7. Rights of Data Subjects</strong></p>
                <p>Under the Data Privacy Act (DPA), you have the right to be informed about how your personal information is processed by the Philippine Statistics Authority (PSA). You may also exercise your rights as a data subject, including the right to access, correct inaccuracies, and object to the processing of your data when based on consent or legitimate interest, as provided by law. If you believe your data privacy rights have been violated, you may report the incident to the PSA at ncr5@psa.gov.ph or file a complaint with the National Privacy Commission to seek appropriate remedies or compensation.</p>

                <p><strong>8. Contact Information</strong></p>
                <p>For inquiries, contact:</p>
                <p>Philippine Statistics Authority PSO - NCR V <br>ESTRELLA R. VARGAS <br> Chief Statistical Specialist <br> Email: ncr5@psa.gov.ph <br> Phone: (02) 8833-8284, (02) 8834-1601</p>

                <p><strong>9. Policy Updates</strong></p>
                <p>PSA reserves the right to modify this privacy statement at any time. If you have any questions or suggestions regarding our privacy policy, please contact us at (02) 8833-8284, (02) 8834-1601. We're located at 3rd Floor STWLPC Building 336-342 Sen. Gil Puyat Avenue (Buendia) Barangay 49, Pasay City 1300. You can email at psa.ncr.pso5@gmail.com or ncr5@psa.gov.ph.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#welcomeModal">
                    Back
                </button>
            </div>

            </div>
        </div>
        </div>

        <div class="overlay"></div>
            <nav class="navbar navbar-expand-lg bg-primary navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#home">
                <img src="/favicon.ico" alt="Logo" width="30"> Digital Library
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                    <a class="nav-link active" href="#home">Home</a>
                    </li>

                    <!-- Dropdown Start -->
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="ncrvDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        NCR-V
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="ncrvDropdown">
                        <li><a class="dropdown-item" href="NCR-V/infographics.php">Infographics</a></li>
                        <li><a class="dropdown-item" href="NCR-V/special-release.php">Special Releases</a></li>
                        <li><a class="dropdown-item" href="NCR-V/womenandmen.php">Women and Men</a></li>
                        <li><a class="dropdown-item" href="NCR-V/countryside_in_figures.php">Countryside in Figures</a></li>
                        <li><a class="dropdown-item" href="NCR-V/public_used_files.php">Public Used Files</a></li>
                    </ul>
                    </li>
                    <!-- Dropdown End -->

                    <!-- Central Office Dropdown Start -->
                    <li class="nav-item dropdown central-office-dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="centralOfficeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Central Office
                        </a>
                        <div class="dropdown-menu p-4 central-office-menu w-100" aria-labelledby="centralOfficeDropdown" style="min-width: 600px;">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6><a class="dropdown-header" href="../Central-Office/household.php">Household</a></h6>
                                    <a class="dropdown-item" href="../Central-Office/household.php?project=Labor+Force+Survey+(LFS)">Labor Force Survey (LFS)</a>
                                    <a class="dropdown-item" href="../Central-Office/household.php?project=Functional+Literacy,+Education+and+Mass+Media+Survey+(FLEMMS)">Functional Literacy, Education and Mass Media Survey (FLEMMS)</a>
                                    <a class="dropdown-item" href="../Central-Office/household.php?project=Family+Income+and+Expenditure+(FIES)">Family Income and Expenditure (FIES)</a>
                                    <a class="dropdown-item" href="../Central-Office/household.php?project=Consumer+Expectations+Survey+(CES)">Consumer Expectations Survey (CES)</a>
                                    <a class="dropdown-item" href="../Central-Office/household.php?project=National+Information+and+Communications+Technology+Household+Survey+(NICTHS)">National Information and Communications Technology Household Survey (NICTHS)</a>
                                    <a class="dropdown-item" href="../Central-Office/household.php?project=Household+Energy+Consumption+Survey+(HECS)">Household Energy Consumption Survey (HECS)</a>
                                    <a class="dropdown-item" href="../Central-Office/household.php?project=Household+Survey+on+Domestic+Visitors+(HSDV)">Household Survey on Domestic Visitors (HSDV)</a>
                                    <a class="dropdown-item" href="../Central-Office/household.php?project=National+Demographic+and+Health+Survey+(NDHS)">National Demographic and Health Survey (NDHS)</a>
                                    <a class="dropdown-item" href="../Central-Office/household.php?project=National+Migration+Survey+(NMS)">National Migration Survey (NMS)</a>
                                </div>
                                <div class="col-md-6">
                                    <h6><a class="dropdown-header" href="../Central-Office/establishment.php">Establishments</a></h6>
                                    <a class="dropdown-item" href="../Central-Office/establishment.php?project=Census+of+Philippine+Business+and+Industry+(CPBI)">Census of Philippine Business and Industry (CPBI)</a>
                                    <a class="dropdown-item" href="../Central-Office/establishment.php?project=Annual+Survey+of+Philippine+Business+and+Industry+(ASPBI)">Annual Survey of Philippine Business and Industry (ASPBI)</a>
                                    <a class="dropdown-item" href="../Central-Office/establishment.php?project=Provincial+Product+Accounting+(PPA)">Provincial Product Accounting (PPA)</a>

                                    <h6><a class="dropdown-header" href="../Central-Office/administrative.php">Administrative</a></h6>
                                    <a class="dropdown-item" href="../Central-Office/administrative.php?project=Approved+Building+Permits">Approved Building Permits</a>

                                    <h6><a class="dropdown-header" href="../Central-Office/civil_registration.php">Civil Registration</a></h6>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    </ul>
                </div>
            </div>
            </nav>

            <section id="home" class="banner-container text-center">
                <div class="title-container">
                    <img src="/favicon.ico" alt="PSA Logo" class="logo img-fluid">
                    <h1>Philippine Statistics Authority - NCR PSO V<br>Digital Library</h1>
                </div>
                
                <form onsubmit="searchFunction(); return false;">
                    <div class="search-container">
                        <input type="text" id="search" name="search" class="search-input" placeholder="Search for books, documents, or topics">
                        <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                    </div>
                </form>
            </section>

            <section class="latest-release">
                <div class="container">
                    <h2>Latest Infographics</h2>
                    <div class="row g-4">
                        <?php foreach ($latestInfographics as $infographic): ?>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="card h-100">
                                    <!-- Use data-filename instead of constructing full paths in PHP -->
                                    <div class="pdf-wrapper" data-filename="<?= htmlspecialchars($infographic['pdf_info']) ?>">
                                        <a href="../Admin Login/Infographics/pdfs/<?= htmlspecialchars($infographic['pdf_info']) ?>" target="_blank">
                                            <canvas class="pdf-thumbnail mb-2" data-pdf="../Admin Login/Infographics/pdfs/<?= htmlspecialchars($infographic['pdf_info']) ?>" style="width:100%; border:2px solid #ccc;"></canvas>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-title text-center">
                                            <a href="#" class="pdf-link" data-filename="<?= htmlspecialchars($infographic['pdf_info']) ?>">
                                                <?= htmlspecialchars($infographic['title_info']) ?>
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="view-all-btn">
                        <a href="/NCR-V/infographics.php" class="btn-view-all">View All <i class='bx bx-right-arrow-alt'></i></a>
                    </div>
                </div>
            </section>


            <section id="about" class="about">
                <h2 class="about-title">About Us</h2>
                <div class="container">
                    <div class="about-content">
                        <div class="about-image">
                            <img src="/Images/bgabout2.png" alt="Digital Library Illustration" class="img-fluid">
                        </div>
                        <div class="about-text">
                            <h3>PSA Digital Library</h3>
                            <p>
                                PSA Digital Library is an online platform designed to make learning and research easier for everyone. 
                                It offers a vast collection of books, documents, photographs, and other valuable materials, all available at your fingertips. 
                            </p>
                            <p>
                                Our goal is to preserve and share knowledge, making it accessible to students, researchers, and anyone with a passion for learning.
                                With a simple and user-friendly design, you can easily search for topics, browse different collections, and discover useful information.
                            </p>
                            <p>
                                Whether you're studying for school, conducting research, or just exploring new ideas, it provides a convenient and reliable way to access a wealth of knowledge. 
                                We are committed to continuously expanding our collection and improving our services to support education, research, and lifelong learning.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="about-mv">
                <div class="about-container">
                    <div class="about-row">
                        <div class="about-box">
                            <h2>Vision</h2>
                            <p>Solid, responsive, and world-class authority on quality statistics, efficient civil registration, and inclusive identification system.</p>
                        </div>
                        <div class="about-box">
                            <h2>Mission</h2>
                            <p>Deliver relevant and reliable statistics, efficient civil registration services, and inclusive identification system for equitable development towards improved quality of life for all.</p>
                        </div>
                    </div>
                    <div class="about-full-box">
                        <h2>Quality Policy</h2>
                        <p>We, the Philippine Statistics Authority, commit to deliver relevant and reliable statistics, efficient civil registration services and inclusive identification system to our clients and stakeholders.</p>
                        <p>We adhere to the UN Fundamental Principles of Official Statistics in the production of quality general-purpose statistics.</p>
                        <p>We commit to deliver efficient civil registration services and inclusive identification system in accordance with the laws, rules, and regulations, and other statutory requirements.</p>
                        <p>We endeavor to live by the established core values and corporate personality of PSA and adopt the appropriate technology in the development of our products and delivery of services to ensure customer satisfaction.</p>
                        <p>We commit to continually improve the effectiveness of our Quality Management System towards equitable development for improved quality of life for all.</p>
                    </div>
                </div>
            </section>

            <section id="contact" class="contact">
                <?php include ('footer.php'); ?>
            </section>

            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const basePath = "/Admin Login/Infographics/pdfs/";

                    // Render PDFs
                    document.querySelectorAll(".pdf-wrapper").forEach(wrapper => {
                    const filename = wrapper.getAttribute("data-filename");
                    const encodedFilename = encodeURIComponent(filename);
                    const pdfUrl = `${basePath}${encodedFilename}`;
                    const canvas = wrapper.querySelector("canvas");
                    const context = canvas.getContext("2d");

                    pdfjsLib.getDocument(pdfUrl).promise.then(pdf => {
                        return pdf.getPage(1);
                    }).then(page => {
                        const scale = 1.5;
                        const viewport = page.getViewport({ scale });
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;

                        return page.render({
                        canvasContext: context,
                        viewport: viewport
                        }).promise;
                    }).catch(error => {
                        console.error("Error rendering PDF:", error);
                        context.font = "16px sans-serif";
                        context.fillText("Unable to load preview", 10, 50);
                    });
                    });

                    // Fix PDF click links
                    document.querySelectorAll(".pdf-link").forEach(link => {
                    const filename = link.getAttribute("data-filename");
                    const encodedFilename = encodeURIComponent(filename);
                    link.setAttribute("href", `${basePath}${encodedFilename}`);
                    link.setAttribute("target", "_blank");
                    });
                });
            </script>



        <script>
            function searchFunction() {
                const query = document.getElementById("search").value.trim().toLowerCase();
                if (!query) return;

                const routes = [
                    // NCR-V
                    { keywords: ["infographics", "info", "infographic", "graphics", "graphic", "ncr-v", "ncr v", "ncr 5", "ncr"], url: "../NCR-V/infographics.php" },
                    { keywords: ["special release", "special releases", "sp", "special"], url: "../NCR-V/special-release.php" },
                    { keywords: ["women and men", "wam","women","woman","men","man"], url: "../NCR-V/womenandmen.php" },
                    { keywords: ["countryside in figures", "cif", "country", "countryside", "figures", "countryside in figure"], url: "../NCR-V/countryside_in_figures.php" },
                    { keywords: ["public used files", "public used file", "puf", "public", "used", "files", "used files"], url: "../NCR-V/public_used_files.php" },
                    //Central Office branches
                    { keywords: ["household", "households"], url: "../Central-Office/household.php" },
                    { keywords: ["establishment", "establishments"], url: "../Central-Office/establishment.php" },
                    { keywords: ["administrative", "admin"], url: "../Central-Office/administrative.php" },
                    // Central Office > Household
                    { keywords: ["labor force survey", "lfs", "labor", "force"], url: "../Central-Office/household.php?project=Labor+Force+Survey+(LFS)" },
                    { keywords: ["functional literacy, education and mass media survey", "functional", "flemms", "functional literacy", "education", "mass media"], url: "../Central-Office/household.php?project=Functional+Literacy,+Education+and+Mass+Media+Survey+(FLEMMS)" },
                    { keywords: ["fies", "family income", "family income and expenditure survey","family", "expenditure"], url: "../Central-Office/household.php?project=Family+Income+and+Expenditure+Survey+(FIES)" },
                    { keywords: ["ces", "consumer", "consumer expectations", "consumer expectations survey"], url: "../Central-Office/household.php?project=Consumer+Expectations+Survey+(CES)" },
                    { keywords: ["ict", "nict", "nictures", "nicts", "nicts", "nicths", "national information and communications technology household survey", "information communications technology"], url: "../Central-Office/household.php?project=National+Information+and+Communications+Technology+Household+Survey+(NICTHS)" },
                    { keywords: ["hecs", "household energy consumption survey", "energy consumption", "energy"], url: "../Central-Office/household.php?project=Household+Energy+Consumption+Survey+(HECS)" },
                    { keywords: ["hsdv", "household survey on domestic visitors", "domestic visitors", "domestic"], url: "../Central-Office/household.php?project=Household+Survey+on+Domestic+Visitors+(HSDV)" },
                    { keywords: ["ndhs", "national demographic and health survey", "demographic", "health", "health survey", "national demographic"], url: "../Central-Office/household.php?project=National+Demographic+and+Health+Survey+(NDHS)" },
                    { keywords: ["nms", "national migration survey", "migration", "migration survey", "national migration"], url: "../Central-Office/household.php?project=National+Migration+Survey+(NMS)" },

                    // Central Office > Establishments
                    { keywords: ["cpbi", "census", "census of philippine business and industry","census of business and industry", "business industry"], url: "../Central-Office/establishment.php?project=Census+of+Philippine+Business+and+Industry+(CPBI)" },
                    { keywords: ["aspbi", "annual survey", "annual", "annual survey of philippine business and industry", "survey of business and industry", "business and industry"], url: "../Central-Office/establishment.php?project=Annual+Survey+of+Philippine+Business+and+Industry+(ASPBI)" },
                    { keywords: ["ppa", "provincial", "product", "accounting", "provincial product accounting"], url: "../Central-Office/establishment.php?project=Provincial+Product+Accounting+(PPA)" },

                    // Central Office > Administrative
                    { keywords: ["building permit", "building", "permit", "buildings","permits"], url: "../Central-Office/administrative.php?project=Approved+Building+Permits" },

                    //Central Office > Civil Registration
                    { keywords: ["civil registration", "civil", "registration", "registrations"], url: "../Central-Office/civil_registration.php" },
                ];

                for (const route of routes) {
                    if (route.keywords.some(keyword => query.includes(keyword))) {
                        window.location.href = route.url;
                        return;
                    }
                }

                // If no match found
                alert("No matching document or project found.");
            }
            </script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        </body>
    </html>
