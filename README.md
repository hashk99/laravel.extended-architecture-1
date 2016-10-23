# laravel.extended-architecture-1
extended framework for laravel php framework

# Extended Folder Architecture For Laravel 5.3

 
This repository includes a fresh copy of the laravel 5.3 framework with extended folder architecture. This will help developers when developing large projects. 
  - Used facades to connect services
  - repositories for each models
  - extended exception handling to use dynamically

  ## Domain Folder
Domain folder is to add all the business logics. I've added example files for user table and user roles table.

 ## Infrastructure Folder

Infrastructure folder is to manage all the core services and facades. I've added a sample file as filters to use in models when we need to filter the results.
 
 ### EXTEND DOMAIN FOLDER
 
 
> It is better to extend domain folder when you make a really serious project with laravel. you can devide the domain folder into core and business-name folder in the next level.
     
License
----

MIT


**Free Software, Hell Yeah!** 
