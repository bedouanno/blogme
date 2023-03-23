<p>CodeIgniter is an open-source PHP web application framework that provides developers with a simple and elegant toolkit to create full-featured web applications. It is based on the Model-View-Controller (MVC) architectural pattern and offers a robust set of libraries for common tasks, such as database manipulation, form validation, and session management. CodeIgniter is known for its speed, ease of use, and small footprint, making it an ideal choice for developers who want a framework that is both lightweight and powerful.</p>

<h5>First download the codeigniter file from link below:</h5>
https://codeigniter.com/download

<pre>
> upload the file to htdocs
	> rename the codeigniter to your desire project name
	> make sure the XAMP application is running
	> then open the project to browser with localhost server
		» http://localhost/crud
</pre>

<h3>***Static pages</h3>
<p>The first we're going to do is to set up a controller to handle static pages.</p>

<p>!!! A controller is simply a class that helps delegate work. It is the glue of your web application.</p>

<h3>***CONTROLLER</h3>
<p>> Let's create a controller named Pages</p>

<pre>
root folder
 - application
	- controllers
		[create] - Pages.php
</pre>
<p>The code will be:</p>

<pre style="background: black; color: #fff; padding: 15px;">

class Pages extends CI_Controller {

	public function view($page = 'home'){
		
	}

</pre>


<h3>***VIEW</h3>
<p>Once done created the Pages controller, let us now create view file:</p>
<pre>
application
	- views 
		-[create] templates folder
			-[create] header.php
			-[create] footer.php
			
header.php
footer.php
</pre>

<p>- Then let us create logic to the controller</p>

<pre>
- controllers
	- Pages.php
</pre>


<pre style="background: black; color: #fff; padding: 15px;">
public function view($page = 'home')
{
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
}
</pre>


<h3>**** Routing</h3>
<p>Open the routing file located at application/config/routes.php and add the following two lines. Remove all other code that sets any element in the $route array.</p>

<pre>
application
	- config
		-[open] routes.php
</pre>

<pre style="background: black; color: #fff; padding: 15px;">
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
</pre>


<h4>if Error occour, we have to add htaccess file to root folder</h4>
<pre>
[create].htaccess
	> add the code below:
</pre>

<pre style="background: black; color: #fff; padding: 15px;">
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
</pre>

<h3>***Configuration</h3>
<pre>
application
	- config
		-[open] config.php
			> update base_url:
			$config['base_url'] = 'domain';
			
			> remove index.php:
			$config['index_page'] = 'index.php';
			
		
application
	- config
		-[open] autoload.php
			> add helper
			$autoload['helper'] = array('url','html','file','form');
</pre>


<hr>

<h1>Code Snippets:</h1>

<pre>
base_url();
// short code for main url ./ 'http://example.com/'
	> used to source the files and links
	> base from config.php //$config['base_url'] = 'http://example.com/';
</pre>
	
<h3>CONTROLLER</h3>

<p>// every control has constructor for Initialization</p>

<pre style="background: black; color: #fff; padding: 15px;">
$variable_to_call; 

function __construct(){
	parent::__construct(); // needed when adding a constructor to a controller
	
	$this->variable_to_call = array();		
}
</pre>

<p>// Sample Function for view</p>

<pre style="background: black; color: #fff; padding: 15px;">
public function index(){}
public function view($id =  NULL){}
</pre>


<p>// How to get view </p>

<pre style="background: black; color: #fff; padding: 15px;">
$this->load->('head', $data);
$this->load->('header', $data);
$this->load->('main-folder/file-name', $data);
$this->load->('footer', $data);
</pre>

<h3>VIEW -> FORM</h3>
<pre style="background: black; color: #fff; padding: 15px;">
echo form_open('url-link'); 
</pre>

<pre style="background: black; color: #fff; padding: 15px;">
echo form_close() ?></php> // used to generate the closing </form> tag.
</pre>

<p>helper function provided by CodeIgniter that generates the opening HTML form tag with the specified parameters. It is a convenient way to create an HTML form with the required attributes and security features that are necessary to prevent cross-site request forgery (CSRF) attacks.</p>

<pre style="background: black; color: #fff; padding: 15px;">
echo form_open_multipart('url-link');
is a variant of the form_open() helper function in CodeIgniter that adds the enctype="multipart/form-data" attribute to the opening <form> tag. This attribute is required when you want to allow users to upload files through the form.
</pre>

<p>// Use to add validate message</p>

<pre style="background: black; color: #fff; padding: 15px;">
if(!empty(validation_errors())): 
echo validation_errors(); 
 endif; 
</pre>

<h3>VIEW -> CONTROLLER</h3>
<p>// shortcode to get the input from form</p>

<pre style="background: black; color: #fff; padding: 15px;">
$this->input->post('field name');
$this->form_validation->set_rules('field_name','Field Name','required');
</pre>

<pre style="background: black; color: #fff; padding: 15px;">
if(!$this->form_validation->run() === FALSE){ code hree... } else { if true, manipulate data }
</pre>

<p>// used to store a temporary data in a session that can be accessed only once.</p>

<pre style="background: black; color: #fff; padding: 15px;">
$this->session->set_flashdata('key', 'value');
$this->session->set_flashdata('msg_created', 'Created topic successfuly!')
</pre>

<p>// used to redirect the user to a different URL or route. </p>

<pre style="background: black; color: #fff; padding: 15px;">
redirect();
</pre>

<h3>MODEL -> CONTROLLER</h3>
<p>// adding constructor to iniitialize the database</p>

<pre style="background: black; color: #fff; padding: 15px;">
public function __construct(){
	$this->load->database();
}
</pre>

<p>// Sample Function for model<p>

<pre style="background: black; color: #fff; padding: 15px;">
public functiion get($id = FALSE){ code here... }
public functiion gets(){ code here... }
public functiion create(){ code here... }
public function update(){ code here ...}
</pre>

<hr>

<h1>Admin Dashboard Template</h1>
https://startbootstrap.com/theme/sb-admin-2
