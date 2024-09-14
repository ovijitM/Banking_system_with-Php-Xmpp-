<h1 align="center">Bank Management System</h1>
<p align="center">
  This project is a <strong>Bank Management System</strong> designed to handle various banking operations, such as managing accounts, processing transactions, and handling bank applications.
</p>
<h2>Database Structure</h2>
<h3>Database: <code>bank_1</code></h3>
<p>This database is responsible for managing core banking operations, including customer accounts, staff details, transactions, and vault management.</p>
<h4>Tables:</h4>
<h5><strong>account</strong></h5>
<pre><code>CREATE TABLE account (
    account_number INT(10),
    password VARCHAR(255),
    name VARCHAR(255),
    email VARCHAR(255)
);
</code></pre>
<h5><strong>customer</strong></h5>
<pre><code>CREATE TABLE customer (
    account_number INT(10),
    name VARCHAR(255),
    email VARCHAR(255),
    balance DECIMAL(10,2),
    nid CHAR(10),
    date_of_birth DATE,
    join_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
</code></pre>
<h5><strong>staff</strong></h5>
<pre><code>CREATE TABLE staff (
    user_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);
</code></pre>
<h5><strong>transaction_history</strong></h5>
<pre><code>CREATE TABLE transaction_history (
    time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    from_account_number INT(10),
    to_account_number INT(10),
    transaction_type VARCHAR(255),
    amount DECIMAL(10,2)
);
</code></pre>
<h5><strong>vault</strong></h5>
<pre><code>CREATE TABLE vault (
    bank_name VARCHAR(256),
    bank_master_account INT(10),
    balance INT(10)
);
</code></pre>
<h3>Database: <code>bank_system</code></h3>
<p>This database handles the management of bank applications and approved banks.</p>
<h4>Tables:</h4>
<h5><strong>bank_applications</strong></h5>
<pre><code>CREATE TABLE bank_applications (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    bank_name VARCHAR(100) NOT NULL,
    owner_name VARCHAR(100) NOT NULL,
    approved TINYINT(1) DEFAULT 0
);
</code></pre>
<h5><strong>banks</strong></h5>
<pre><code>CREATE TABLE banks (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    bank_name VARCHAR(100) NOT NULL,
    account_number INT(10) NOT NULL,
    balance DECIMAL(10,2) NOT NULL
);
</code></pre>
<h2>Features</h2>
<ul>
  <li><strong>Account Management:</strong> Handles customer accounts, including creation, authentication, and balance management.</li>
  <li><strong>Transaction Processing:</strong> Records all transactions between accounts, maintaining a comprehensive history.</li>
  <li><strong>Staff Management:</strong> Manages staff details and access to the system.</li>
  <li><strong>Vault Management:</strong> Manages the bank's central vault, keeping track of the master account's balance.</li>
  <li><strong>Bank Applications:</strong> Handles the application process for new banks, including approval and management of approved banks.</li>
</ul>
<h2>Technologies Used</h2>
<ul>
  <li><strong>MariaDB:</strong> For managing and storing the relational data across the two databases.</li>
  <li><strong>SQL:</strong> For querying and manipulating the database.</li>
</ul>
<h2>Setup and Installation</h2>
<ol>
  <li>Clone the repository.</li>
  <pre><code>git clone https://github.com/your-username/your-repo.git
cd your-repo
</code></pre>
  <li>Configure the database connections in the project to connect to <code>bank_1</code> and <code>bank_system</code>.</li>
  <li>Import the provided SQL files to set up the <code>bank_1</code> and <code>bank_system</code> databases.</li>
  <li>Run the application.</li>
</ol>
<h2>License</h2>
<p>This project is licensed under the MIT License - see the <a href="LICENSE">LICENSE</a> file for details.</p>
