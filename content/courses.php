<html><?php
	include("template/header.php");
?>
<br></br>
<HEAD><script type="text/javascript">
var collapseDivs, collapseLinks;

function createDocumentStructure (tagName) {
  if (document.getElementsByTagName) {
    var elements = document.getElementsByTagName(tagName);
    collapseDivs = new Array(elements.length);
    collapseLinks = new Array(elements.length);
    for (var i = 0; i < elements.length; i++) {
      var element = elements[i];
      var siblingContainer;
      if (document.createElement && 
          (siblingContainer = document.createElement('div')) &&
          siblingContainer.style) 
      {
        var nextSibling = element.nextSibling;
        element.parentNode.insertBefore(siblingContainer, nextSibling);
        var nextElement = elements[i + 1];
        while (nextSibling != nextElement && nextSibling != null) {
          var toMove = nextSibling;
          nextSibling = nextSibling.nextSibling;
          siblingContainer.appendChild(toMove);
        }
        siblingContainer.style.display = 'none';
        
        collapseDivs[i] = siblingContainer;
        
        createCollapseLink(element, siblingContainer, i);
      }
      else {
        // no dynamic creation of elements possible
        return;
      }
    }
    createCollapseExpandAll(elements[0]);
  }
}

function createCollapseLink (element, siblingContainer, index) {
  var span;
  if (document.createElement && (span = document.createElement('span'))) {
    span.appendChild(document.createTextNode(String.fromCharCode(160)));
    var link = document.createElement('a');
    link.collapseDiv = siblingContainer;
    link.href = '#';
    link.appendChild(document.createTextNode('Expand'));
    link.onclick = collapseExpandLink;
    collapseLinks[index] = link;
    span.appendChild(link);
    element.appendChild(span);
  }
}

function collapseExpandLink (evt) {
  if (this.collapseDiv.style.display == '') {
    this.parentNode.parentNode.nextSibling.style.display = 'none';
    this.firstChild.nodeValue = 'Expand';
  }
  else {
    this.parentNode.parentNode.nextSibling.style.display = '';
    this.firstChild.nodeValue = 'Collapse';
  }

  if (evt && evt.preventDefault) {
    evt.preventDefault();
  }
  return false;
}

function createCollapseExpandAll (firstElement) {
  var div;
  if (document.createElement && (div = document.createElement('div'))) {
    var link = document.createElement('a');
    link.href = '#';
    link.appendChild(document.createTextNode('Expand All'));
    link.onclick = expandAll;
    div.appendChild(link);
    div.appendChild(document.createTextNode(' '));
    link = document.createElement('a');
    link.href = '#';
    link.appendChild(document.createTextNode('Collapse All'));
    link.onclick = collapseAll;
    div.appendChild(link);
    firstElement.parentNode.insertBefore(div, firstElement);
  }
}

function expandAll (evt) {
  for (var i = 0; i < collapseDivs.length; i++) {
    collapseDivs[i].style.display = '';
    collapseLinks[i].firstChild.nodeValue = 'Collapse';
  }
  
  if (evt && evt.preventDefault) {
    evt.preventDefault();
  }
  return false;
}

function collapseAll (evt) {
  for (var i = 0; i < collapseDivs.length; i++) {
    collapseDivs[i].style.display = 'none';
    collapseLinks[i].firstChild.nodeValue = 'Expand';
  }
  
  if (evt && evt.preventDefault) {
    evt.preventDefault();
  }
  return false;
}
</script>
<script type="text/javascript">
window.onload = function (evt) {
  createDocumentStructure('h1');
}
</script></HEAD>
<BODY>
<h1>FRESHMAN YEAR</h1>
<h3>CSC 105</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39928" target="blank">Introduction to Computing and Computer Applications</a>
<h3>CSC 112</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39930" target="blank">Introduction to Computer Programming</a>
<h3>CSC 131</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=41829" target="blank">Introduction to Computer Science</a>
<h3>CSC 133</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39932" target="blank">Discrete Mathematical Structures</a>
<h1>SOPHOMORE YEAR</h1>
<h3>CSC 220</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39934" target="blank">3-D Computer Graphics Tools and Literacy</a>
<h3>CSC 231</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=41828" target="blank">Introduction to Data Structures</a>
<h3>CSC 242</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39936" target="blank">Computer Organization</a>
<h3>CSC 275</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39938" target="blank">Topics in Computer Science and Technology</a>
<h1>JUNIOR YEAR</h1>
<h3>CSC 315</h3><a href=http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=41876" target="blank">Application Development for Mobile Devices</a>
<h3>CSC 320</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39940" target="blank">Computer Animation</a>
<h3>CSC 331</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=41827" target="blank">Object-Oriented Programming and Design</a>
<h3>CSC 340</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39942" target="blank">Scientific Computing</a>
<h3>CSC 342</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39943" target="blank">Operating Systems</a>
<h3>CSC 344</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39944" target="blank">Computer Networks</a>
<h3>CSC 360</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39945" target="blank">Formal Languages and Computability</a>
<h3>CSC 370</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39946" target="blank">Computer Graphics</a>
<h3>CSC 380</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=41874" target="blank">Design and Analysis of Algorithms</a>
<h3>CSC 385</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39947" target="blank">Professional and Ethical Issues in Computer Science</a>
<h1>SENIOR YEAR</h1>
<h3>CSC 415</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39948" target="blank">Artificial Intelligence</a>
<h3>CSC 421</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39949" target="blank">Computer Gaming</a>
<h3>CSC 430</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39950" target="blank">Digital Visual Effects</a>
<h3>CSC 434</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39951" target="blank">Programming Languages</a>
<h3>CSC 437</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39952" target="blank">Parallel Computing</a>
<h3>CSC 442</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39953" target="blank">Computer System Architecture</a>
<h3>CSC 446</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39954" target="blank">Grid Computing</a>
<h3>CSC 450</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39955" target="blank">Software Engineering</a>
<h3>CSC 455</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39956" target="blank">Database Design and Implementation</a>
<h3>CSC 457</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39957" target="blank">Compiler Construction</a>
<h3>CSC 475</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39958" target="blank">Topics in Computer Science</a>
<h3>CSC 491</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39959" target="blank">Directed Individual Study</a>
<h3>CSC 495</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39960" target="blank">Seminar in Computer Science</a>
<h3>CSC 498</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39961" target="blank">Internship in Computer Science</a>
<h3>CSC 499</h3><a href="http://catalogue.uncw.edu/preview_course_nopop.php?catoid=17&coid=39962" target="blank">Honors Work in Computer Science</a>
 </BODY>
</html>