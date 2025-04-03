<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Statement of Credits</title>
    <link rel="icon" href="/~s2694679/Website/images/logo.png" type="image/png">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="credit-wrapper">
    <div class="back-link">
        <a href="index.php">&#11013;Home</a>
    </div>

    <h1>Statement of Credits</h1>
    <h2>Majority of the references used to help in the creation of this website.</h2>
    <div class="top-motifs">
    <h3><u>All references used are within the scripts.</h3></u>
    </div>

    <div class="top-motifs">
        <h2>Use of AI</h2>
        <p>
            Throughout the development of this website, AI (ChatGPT-4o) was utilised.
        </p>
        <p>
            Its primary use was to assist in debugging, especially during the integration of different pages and files into the one page.
        </p>
        <p>
            <b>Specific examples of use will be provided in detail on the individual page breakdown</b>
        </p>
        </ul>
    </div>

    <div class="credit-section">
        <h2>PHP Pages</h2>

        <h3>index.php</h3>
        <ul class="credit-list">
            <li><a href="https://www.w3schools.com/tags/tag_select.asp">Select Tag</a> - Understand how to utilise the select tag to choose an option from a dropdown and pass this onto the fetch_sequences.py script.</li>
            <li><a href="https://www.w3schools.com/howto/howto_js_topnav.asp">Top Bar Style CSS</a> - Helped in designing header bar. I wanted to have a top bar containing a logo and the links to other parts of the website. </li>        </ul>

        <h3>sequences.php</h3>
        <ul class="credit-list">
            <b><li><a href="https://chatgpt.com/">AI</a> - I had some trouble making sure the results table always having the horizonal scroll bar, so helped debug and understand how best to split the sections and style.</li></b>
            <li><a href="https://www.php.net/manual/en/book.session.php">Session Help</a> - Helped the understanding of how to use _SESSION to store session data so many people can use the website and have their own unique session.</li>
            <li><a href="https://www.w3schools.com/bootstrap4/bootstrap_containers.asp">Containers</a> - Containers to help split the page into seperate sections makes it easier to manage the objects within it, espcially the main results table.</li>
            <li><a href="https://www.php.net/manual/en/function.escapeshellarg.php">Escapeshellarg: Passing User Input</a> - Understanding how to safely pass user input to a shell command and run the python script.</li>
            <li><a href="https://www.php.net/manual/en/function.shell-exec.php">Shell_exec: Passing User Input</a> - Understanding how to safely pass user input to a shell command and run the python script.</li>
            <li><a href="https://www.php.net/manual/en/function.preg-match-all.php">Parse FASTA output</a> - Extract the headers and sequences from FASTA text using regex.</li>
            <li><a href="https://www.php.net/manual/en/function.array-slice.php">Control Rows on Table</a> - Enforcing $limit to control the rows on the sequences table.</li>
            <li><a href="https://www.w3schools.com/php/php_mysql_select.asp">HTML table generation</a> - Adapted to help create the table that displayed each sequence (Was used mainly to help with PDO connection but has content for making of table).</li>
            <li><a href="https://www.php.net/manual/en/function.htmlspecialchars.php">Output escaping</a> - Display special characters as text in the browser (was more of a necessity easlier on in the code but still works with updated version).</li>
            <li><a href="https://www.geeksforgeeks.org/how-to-always-show-scrollbars-with-css/">Scroll hint and layout</a> - Tips to help the UI for the scroll feature.</li>
            <li><a href="https://www.w3schools.com/howto/howto_css_sticky_element.asp">Sticky select button</a> - CSS help to make sure the select button is always there no matter the table orientation.</li>
        </ul>

        <h3>store_selected.php</h3>
        <ul class="credit-list">
            <li><a href="https://www.php.net/manual/en/pdo.prepare.php">PDO prepare</a> - Prepared statement with parameters to delete the rows from the DB only with the current session_id.</li>
            <li><a href="https://www.php.net/manual/en/reserved.variables.session.php">Store parsed sequences</a> - Session storage help to re-access stored data.</li>
            <li><a href="https://www.w3schools.com/php/php_forms.asp">Submitting forms</a> - Help with form handling to check if form was submitted and contain selected checkboxes.</li>
            <li><a href="https://dev.mysql.com/doc/refman/8.0/en/insert.html">Ignore SQL</a> - Adapted code to prevent inserting duplicate entries and therefore duplicate results.</li>
            <li><a href="https://dev.mysql.com/doc/refman/8.0/en/information-functions.html#function_last-insert-id">Last_Insert_ID</a> - Only return the last auto_increment value inserted by this session.</li>
            <li><a href="https://www.php.net/manual/en/pdostatement.execute.php">PDO Help</a> - Ececuting SQL statements using PDO help.</li>
            <li><a href="https://developer.mozilla.org/en-US/docs/Web/API/EventTarget/addEventListener">Concervation Analysis JS</a> - Used to figure out how to prevent reloading page. </li>
            <li><a href="https://developer.mozilla.org/en-US/docs/Web/API/Event/preventDefault">Concervation Analysis JS</a> - Also used to figure out how to prevent reloading page. </li>
            <li><a href="https://developer.mozilla.org/en-US/docs/Web/API/Element/innerHTML">Concervation Analysis JS<</a> - Real time updates to show loading message to notify user that stuff is happening .</li>
            <li><a href="https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API">Concervation Analysis JS<</a> - How to use fetch to make an AJAX request, so analysis loads on same page.</li>
            <li><a href="https://developer.mozilla.org/en-US/docs/Web/API/Response/text">Concervation Analysis JS<</a> - Get the text returned from the PHP scruos and puts it in the results container.</li>
            <li><a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Promise/catch">Concervation Analysis JS<</a> - Page kept on failing so this allowed me to see the errors and display them.</li>
            <b><li><a href="https://chatgpt.com/">AI</a> - Kept running into errors so used it to help find out how to display the errors on the page so I can disect it.</li></b>
            <li><a href="https://developer.mozilla.org/en-US/docs/Web/API/Response/text">Concervation Analysis JS<</a> - Get the text returned from the PHP scruos and puts it in the results container.</li>
        </ul>

        <h3>store_motifs.php</h3>
        <ul class="credit-list">
            <b><li><a href="https://chatgpt.com/">AI</a> - Help with coding error reporting so i could understand what wasnt functioning correctly. (E_ALL & ini_set('display_errors', 1))</li></b>
            <li><a href="https://www.php.net/manual/en/function.error-reporting.php">Error Reporting</a> - Helped alongside AI tool to understand error reporting.</li>
            <li><a href="https://www.php.net/manual/en/function.file.php">Text Loading</a> - Load each line from a text file into an array, trimming new lines and ignoring the empty ones.</li>
            <li><a href="https://www.php.net/manual/en/function.file.php">Text Loading</a> - Load each line from a text file into an array, trimming new lines and ignoring the empty ones.</li>
            <li><a href="https://www.php.net/manual/en/function.list.php">Lists</a> - Assigning results as a list to $parts</li>
        </ul>
        
        <h3>conservation_analysis.php</h3>
        <ul class="credit-list">
            <b><li><a href="https://chatgpt.com/">AI</a> - Help me clarify what the graph is showing so i could label correctly and plan future analysis.</li></b>
            <li><a href="http://www.clustal.org/omega/clustalo-api/">Clustal Omega</a> - Have never used this tool so documentation used to identify what i needed to produce correct plot.  </li>
            <li><a href="......">Command Line Inputs</a> -  </li>
        </ul>

        <h3>analysis.php</h3>
        <ul class="credit-list">
            <b><li><a href="https://chatgpt.com/">AI</a> - Utilised here to figure out the positions into bins to then be converted into js format and parse onto the JavaScript position chart analysis file. </li></b>
            <li><a href="https://www.php.net/manual/en/function.wordwrap.php">Wordwrap</a> -  Properly format fasta as requires lines to wrap at 60 characters. Create the user specific fasta file.</li>
            <li><a href="https://www.php.net/manual/en/function.file-put-contents.php">FASTA File Help</a> - Help generate the fasta file into the correct format for parsing.</li>
            <li><a href="https://www.php.net/manual/en/function.shell-exec.php">Run Python Script</a> - Correctly run external scripts. </li>
            <li><a href="https://www.php.net/manual/en/function.ob-start.php">Run PHP script inside another</a> - Running a seperte script and not display the output, so can store motifs post analysis </li>
            <b><li><a href="https://chatgpt.com/">AI</a> - Tip to use header(location) to stop duplication upon refresh. </li></b>
            <li><a href="https://www.php.net/manual/en/function.header.php">Prevent Duplication</a> - After POST, redirecting to stop it from resubmitting form on every refresh</li>
            <li><a href="https://www.php.net/manual/en/function.floor.php">Position Binning</a> - Convert exact motif start position into the bins to use in JS script. </li>
            <li><a href="https://www.php.net/manual/en/function.json-encode.php">PHP Array to JavaScript</a> - Prep the data for the JavaScript rendering in Chart.js. </li>
            <li><a href="https://www.chartjs.org/docs/latest/">Chart.js</a> - How to use Chart.js to create a dynamic chart for the motif analysis. </li>
            <li><a href="https://www.php.net/manual/en/function.htmlspecialchars.php">Safe Output</a> - Again to display characters correctly. </li>
            <li><a href="https://css-tricks.com/snippets/css/a-guide-to-flexbox/">Flexible Wrappers</a> - Helpful tips for the flexible wrapper aligning the main_results table and the right-column for all the analysis plots.</li>
            <li><a href="https://developer.mozilla.org/en-US/docs/Learn_web_development/Core/CSS_layout/Responsive_Design">Resizing Page Help</a> - I ran into some trouble when zooming the page in and out or changing from one screen size to another. Helped with stacking components so the zoom wasnt strange. </li>
            <li><a href="https://www.chartjs.org/docs/latest/configuration/layout.html">Chart.js Layout Tips</a> - Tips for the Chart.js plot placing and sizing.</li>
            <li><a href="https://developer.mozilla.org/en-US/docs/Web/CSS/box-shadow">Clean Page</a> - Understaning soft boarders around table and containers to give the page a cleaner look. </li>
        </ul>

        <h3>example.php</h3>
        <ul class="credit-list">
            <b><li><a href="https://chatgpt.com/">AI</a> - Same as before where i needed to figure out how to send the user to sequences.php page once injecting the example FASTA to continue the analysis.</li></b>
            <li><a href="https://www.php.net/manual/en/language.types.string.php#language.types.string.syntax.heredoc">Store Strings</a> - Mimic what would happen if the user submitted the results themself through the search feature and E0F makes it easy to store long strings. </li>
            <li><a href="https://www.php.net/manual/en/function.unset.php">Unset</a> - I used this as needed to figure out how to clear previously stored parsed sequence data to prevent mismatched errors when refreshing. </li>
        </ul>
    </div>

    <div class="credit-section">
        <h2>Python Scripts</h2>

        <h3>fetch_sequences.py</h3>
        <ul class="credit-list">
            <b><li><a href="https://chatgpt.com/">AI</a> - Help understand how to pass the user inputs to the python script.</li></b>
            <li><a href="https://docs.python.org/3/library/sys.html">Command Line Inputs</a> - I used this to allow the PHP backend to pass the user input (protein, taxon, number of results) when calling the script. </li>
            <li><a href="https://biopython.org/docs/latest/Tutorial/index.html">ENTREZ Refresher</a> - Refresh how to use access the NCBI database and parse the sequence data. Had experience doing this in the biological database course from last semester. </li>
            <li><a href="https://biopython.org/wiki/SeqIO">Handling FASTA Data</a> - More informatuon on how to read fasta data. </li>
        </ul>

        <h3>conservation_plot.py</h3>
        <ul class="credit-list">
            <b><li><a href="https://chatgpt.com/">AI</a> - Clarrification of entropy calculation and how to combine this with the sequence aniglment fasta. Also what tool to use for FASTA sequence allignments.</li></b>
            <li><a href="http://biopython.org/wiki/AlignIO">AlignIO</a> - Used this to read the FASTA formatted multiple sequence alignments. </li>
            <li><a href="https://biopython.org/docs/latest/Tutorial/index.html">Biopython AlignIO</a> - Explains how to read the alignments from FASTA.</li>
            <li><a href="https://en.wikipedia.org/wiki/Entropy_(information_theory)">Entropy</a> - Entropy details.</li>
            <li><a href="https://lamdv.github.io/Scientific%20Journey/Sequence%20visualization%20with%20matplotlib/">Visualisation Help</a> - Help with Matplotlib plotting techniques to visualise concervation.</li>
            <li><a href="">Command Line Inputs</a> - .</li>
        </ul>

        <h3>motif_analysis.py</h3>
        <ul class="credit-list">
            <li><a href="https://docs.python.org/3/library/os.html">File Handling</a> - Help to understand how to handle files and checking. </li>
            <li><a href="https://docs.python.org/3/library/subprocess.html">Tool Running</a> - Information on how to run tools like patmatmotifs. </li>
            <li><a href="https://docs.python.org/3/library/os.html#os.remove">Remove old results</a> - Needed to make sure the the results are always from the most recent query. </li>
            <li><a href="https://en.wikipedia.org/wiki/FASTA_format">FASTA Formating</a> - Helped when designing the script to pass the fasta files. Understood how to get full control over how the sequence blocks are handled.</li>
            <li><a href="https://docs.python.org/3/library/subprocess.html#subprocess.run">Execute Patmatmotifs</a> - Execute the tool for each individual sequence.</li>
            <b><li><a href="https://chatgpt.com/">AI</a> - Was having trouble using the patmatmotifs tool but this helped me identify that i was not running the sequences individually and only the last one on the list.</li></b>
            <li><a href="https://emboss.sourceforge.net/apps/release/6.6/emboss/apps/patmatmotifs.html">Patmatmotifs Help</a> - I had never used this tool so the emboss sight helped me gain an understanding of how to use it.</li>
            <li><a href="https://docs.python.org/3/library/os.html#os.remove">Removing Temporary Files</a> - To prevent clutter and keep the directory clean when each sequence is processed.</li>
        </ul>

        <h3>motif_plot.py</h3>
        <ul class="credit-list">
            <li><a href="https://docs.python.org/3/tutorial/datastructures.html#list-comprehensions">Formatting Help</a> - Some help on formatting the lists to the correct way to parse. </li>
            <li><a href="https://matplotlib.org/stable/api/_as_gen/matplotlib.pyplot.savefig.html">Save Figure</a> - How to save the chart which can then be displayed on the page. </li>
        </ul>

        <h3>parse_motifs.py</h3>
        <ul class="credit-list">
            <b><li><a href="https://chatgpt.com/">AI</a> - script was not working correctly because I tried to parse everything in one go without checking if all the required values were filled in. ChatGPT helped me add logic to ensure each motif was only stored once all values (accession, motif name, start, and end positions) were present, and also suggested resetting the variables after each entry. This fixed the alignment issue and ensured the parsed values were complete and accurate.</li></b>
            <li><a href="https://docs.python.org/3/tutorial/inputoutput.html#methods-of-file-objects">Read_line</a> - Loading the file into memory and each line as an item in a list so can index later. </li>
            <li><a href="https://docs.python.org/3/library/re.html">Regular Expression</a> - The line formatting is varied so have to extract specific patterns from them.</li>
        </ul>
    </div>

    <div class="credit-section">
        <h2>JavaScript</h2>

        <h3>position_chart.js</h3>
        <ul class="credit-list">
            <li><a href="https://www.chartjs.org/docs/latest/charts/bar.html">Chart.js</a> - Script adapted from the example given for bar chart on Chart.js. </li>
            <li><a href="https://developer.mozilla.org/en-US/docs/Web/CSS/color_value/hsl">Colour Syntax</a> - Helped in assigning unique colour for each motif using the HSL rotation (Autogenerates colours - VERY COOL!). </li>
            <li><a href="https://www.chartjs.org/docs/latest/configuration/tooltip.html#tooltip-callbacks">Callbacks</a> - Help customising the hover tooltips. Excelent feature of Chart.js.</li>
            <li><a href="https://www.chartjs.org/docs/latest/configuration/responsive.html">Responsive</a> - Had an issue where chart was not resizing correctly on my smaller screen. This along with CSS container formating fixed this issue. </li>
        </ul>
    </div>

    <div class="credit-section">
        <h2>Fun Stuff</h2>

        <h3>Styling</h3>
        <ul class="credit-list">
            <li><a href="https://www.w3schools.com/css/css_examples.asp">Style Help</a> - Used this to help for page design.</li>
            <li><a href="https://symbl.cc/">Symbols</a> - Used this site to lookup fun symbols i could add to the site.</li>
        </ul>
    </div>

</div>

</body>
</html>
