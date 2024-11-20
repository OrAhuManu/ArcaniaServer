# ServerDashboard
A retro-themed dashboard for managing your Raspberry Pi server. This project allows you to monitor and manage system resources through a web interface.

## Features
- **Temperature Monitoring**: View CPU temperature with dynamic graphs.
- **Network Stats**: Monitor bandwidth usage and IP addresses.
- **Disk Usage**: Check free and used space.
- **Process Supervision**: Overview of running processes.
- **UPnP & DuckDNS Status**: Real-time information on UPnP and DuckDNS.
- **PAM Authentication**: Secured access using Linux system credentials.

## Requirements
- **Operating System**: Raspbian Minimal
- **Hardware**: Raspberry Pi 1B
- **Web Server**: Apache with PHP support
- **Programming Language**: PHP, Python 3
- **Libraries and Tools**: PAM, AJAX, psutil (Python)

## Installation Instructions

### 1. Install Required Software
1. Update your system:
    ```bash
    sudo apt update && sudo apt upgrade -y
    ```
2. Install Apache, PHP, and required Python libraries:
    ```bash
    sudo apt install apache2 php python3 python3-pip libpam0g-dev
    pip3 install psutil
    ```

### 2. Deploy the Dashboard
1. Download the project files and extract them:
    ```bash
    wget <link-to-zip> -O ServerDashboard.zip
    unzip ServerDashboard.zip
    ```
2. Move the `web` folder to your Apache root directory:
    ```bash
    sudo mv web /var/www/html/
    ```

### 3. Configure PAM Authentication
#### a. Enable PAM for Apache
1. Install the `mod_authnz_pam` module:
    ```bash
    sudo apt install libapache2-mod-authnz-pam
    ```
2. Enable the PAM module in Apache:
    ```bash
    sudo a2enmod authnz_pam
    sudo systemctl restart apache2
    ```

#### b. Configure Apache Virtual Host
1. Open the configuration file for your default site:
    ```bash
    sudo nano /etc/apache2/sites-available/000-default.conf
    ```
2. Add the following lines to enable PAM-based authentication:
    ```apache
    <Directory /var/www/html>
        AuthType Basic
        AuthName "Restricted Access"
        AuthBasicProvider PAM
        AuthPAMService apache
        Require valid-user
    </Directory>
    ```
3. Save the file and restart Apache:
    ```bash
    sudo systemctl restart apache2
    ```

#### c. Configure PAM for Apache
1. Open the PAM configuration file for Apache:
    ```bash
    sudo nano /etc/pam.d/apache
    ```
2. Ensure the following lines are present:
    ```plaintext
    auth required pam_unix.so
    account required pam_unix.so
    ```

### 4. Test the Dashboard
1. Open your web browser and navigate to your Raspberry Pi's IP address:
    ```plaintext
    http://<your-server-ip>/
    ```
2. You will be prompted to log in. Use your Linux system username and password.

## Usage
- **Update Buttons**: Use the "Update All" button to refresh all sections of the dashboard dynamically. Individual sections can be updated using their respective buttons.
- **Graphical Monitoring**: View temperature, memory, and CPU usage in real-time through interactive charts.

## Troubleshooting
- **Permission Issues**: Ensure Apache has the necessary permissions to access system files.
- **PAM Authentication Errors**: Verify the PAM module and configuration.
- **Missing Data**: Check that the Python script has the necessary libraries installed (`pip3 install psutil`).

## Contributing
Feel free to fork this repository and submit pull requests with improvements or bug fixes.

## License
This project is open-source and available under the MIT License.
