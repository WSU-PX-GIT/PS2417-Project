## Overview

This Laravel project is designed to track CPD records and certifications for real-estate agents.
the main code is divided into three segments, Agent, Agency and Admin. agent is the basic access to the system, an agent can create cpd records, and track when there are due to renew. 
Agency is the highest publicly accessible tier, a agency have access to multiple different agent accounts and can view their reports and monitor if they are overdue. 
The Admin tier is the highest access level, but is only for employees of CPD tracking. this tier can create accounts and modify the CPD certifications themselves.

## File Overview

There are multiple user layout folders, one for each user type: admin, agent and agency. along with this are controllers for the CPD qualifications and CPD reports.

## Migration Process
Using LightSail AWS:
Navigate to the Correct Web Root Directory
Use this command to navigate to the Bitnami web root:
- `cd /opt/bitnami/apache2/htdocs`

Clone GitHub Repository
sudo git clone https://github.com/WSU-PX-GIT/PS2417-Project.git

Install node dependencies and build them using the following command lines:

- `npm install`
- `npm run build`

Install Composer Dependencies (ensure you are in the project file):

- `cd /opt/bitnami/apache2/htdocs/PS2417-Project` (may differ based on path of the project)
- `sudo composer install`

If the project doesn't consist of the folders cache, sessions and views in the framework folder, then run the following commands:

- `mkdir -p storage/framework/cache`
- `mkdir -p storage/framework/sessions`
- `mkdir -p storage/framework/views`

copy '.env.example' and rename to '.env'. change any necessary environment variables like database connection

- `sudo php artisan key:generate`

Migrate the necessary database tables into the program using the following command:
- `sudo php artisan migrate`

This will provide the base users to use in the system
- `sudo php artisan migrate --seed`

Agent User:
- **Email**: agent@agent.com
- **Password**: password

Agency User:
- **Email**: agency@agency.com
- **Password**: password

Admin User:
- **Email**: admin@admin.com
- **Password**: password

## Support

If you have any problems with this system, please contact Rami Shamon via 20188072@student.westernsydney.edu.au 

