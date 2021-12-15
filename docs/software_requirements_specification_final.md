# Overview
The purpose of SRS document is to provide good understanding about a software system, this Document contains the complete Software requirements for Faculty Management System and describes the goals of the project and it also provides information needed for software design.
# Software Requirements
Software requirements of Faculty Management System determines the use of an application used by Faculties in a University. The web application is only used by the faculty members. It involves functional and non-functional requirements. It even involves external interfaces like user, hardware, software.
## Functional Requirements
### Sign-in-page
| ID | Requirement |
| :-------------: | :----------: |
| FR1 | A well organised login/signin page containing textfields to enter username and password. |
| FR2 | The signin page is accessible by the authorised persons i.e, the admin and the faculty. |
| FR3 |By using required credentials, the individual redirected to their respective pages i.e, admin page and faculty page. |
| FR4 | The faculty need to be registered and accepted by the admin. If not he/she has to register by the redirecting link provided. |
| FR5 | The unauthorised login cresdentials produce a message/popup as "Enter the username and password correctly". |
### Create Faculty
| ID | Requirement |
| :-------------: | :----------: |
| FR6 | The admin create the faculty data with the directing link in the admin homepage. |
| FR7 | A very clear and very easily understable form is provided. |
| FR8 | The confidential faculty data is to be filled in the respective fields. |
| FR9 | The fillable form as details like personal information, educational qualification, service. |
| FR10 |The highly confidential data is created in this page. |
### Update Faculty
| ID | Requirement |
| :-------------: | :----------: |
| FR11 | Admin can update the faculty data with the link in the admin homepage directed to update faculty page. |
| FR12 | He can search for the faculty data by name,departments. |
| FR13 | The update details can be edited and submitted. |
| FR14 | The action done can be done viewed through the details displayed on the page. |
| FR15 | The search and update makes it easier for the admin. |
### Delete Faculty
| ID | Requirement |
| :-------------: | :----------: |
| FR16 | When a faculty steps out of the University, the data of that faculty is deleted from the records. |
| FR17 | This can be done through the delete faculty page. |
| FR18 | The admin can search the faculty data by the search option with name,department. |
| FR19 | The deletion can be done only by admin and once deleted cannot be undone. |
| FR20 | This deletion is for the proper management of storage. |
### View Faculty
| ID | Requirement |
| :-------------: | :----------: |
| FR21 | Admin can view the list of the faculty from the view faculty page. |
| FR22 | The faculty can be viewed by name or depaertment. |
| FR23 | The dropdown list of the search results is found with all details. |
| FR24 | This eases the admin to know the data of the faculty at a glance. |
| FR25 | No data is able to alter in the view page,only for the view purpose. |
## Non-Functional Requirements
### Sign-in-page
| ID | Requirement |
| :-------------: | :----------: |
| NFR1 | SECURITY : The signin page is highly secured only the authorised person can login into the page. |
| NFR2 | PERFORMANCE : The fast and responsive browser page. |
| NFR3 | AVAILABILITY : It is easily available and user friendly environment. |
| NFR4 | RELIABILITY : A reliable environment with fault tolerance. |
| NFR5 | STRUCTURE : A well structured sign-in page. |
### Create Faculty
| ID | Requirement |
| :-------------: | :----------: |
| NFR6 | ENVIRONMENTAL: An user friendly environment can be easily accessible. |
| NFR7 | SECURITY : The confidential data created is secured at the higher ends. |
| NFR8 | MAINTAINABLE : The used data is organised well and can be maintained properly. |
| NFR9 | RELIABILITY : A reliable webpage without a failure. |
| NFR10 | ESSENTIALITY : The page is essential/mandatory for the intialization of the faculty data. |
### Update Faculty
| ID | Requirement |
| :-------------: | :----------: |
| NFR11 | RECOVERABILITY : The data can be recovered on the updated in the page. |
| NFR12 | USABILITY : The data can be easily searched and used. |
| NFR13 | PERFROMANCE : The updatation is done in a proper manner. |
| NFR14 | REGULARITY : The regulation is done till the updatation. |
| NFR15 | FOCUS : The focus is much needed in updation which doesn't alter the data in it. |
### Delete Faculty
| ID | Requirement |
| :-------------: | :----------: |
| NFR16 | SECURITY : The data in the webpage is highly secured. |
| NFR17 | PERFORMANCE : The deletion of data is done carefully and doesn't affect other faculty data. |
| NFR18 | ENVIROMENTAL : The environment is easily understandable and accessible. |
| NFR19 | RELIABLE : The reliable webpage working without a failure. |
| NFR20 | STORAGE : The deleted data is stored in a secondary memory. |
### View Faculty
| ID | Requirement |
| :-------------: | :----------: |
| NFR21 | MAINTAINABILITY : The view faculty webpage is maintanined and organised properly. |
| NFR22 | PERFORMANCE : The processing of the data respectively is done properly. |
| NFR23 | CAPACITY : Any number of the data can be organised in the webpage. |
| NFR24 | SECURITY : The data is accessed by the authorised person only. |
| NFR25 | TRACEABILITY : The data required can be easily traced over the page. |
# Change management plan
##### How will you train people to use it?
People to use the Faculty Management System website need to be trained
OBJECTIVE : There is a need to view the objective for creating the website. The importance of
the task has to be mentioned.
DEMONSTRATE : The faculty has to know about the website and so they has to be trained. By 
giving demonstration of the website, how to use the website without losing credentials. 
Explaining the procedure about how to use the website must be highlighted. Have to express 
confidence among faculty in using the website. And letting the management to observe if anything 
is to be found falsy.	
FEEDBACK : If any thing is found uncovered or unwanted, the developing team has to take the 
suggestions or feedback from the University management.

##### How will you ensure it integrates within their ecosystem / software?

By determining the needs and gain of the required functionality of the website. 
Giving appropriate trainingfor all the faculties to how to use the website. The mechanism 
of the website must be convenient to ise and should be provide efficiency. By assuring the 
better performance and maintenance of the database. By providing authentication mechanism 
for every faculty as ensuring privacy of their data. 

##### How will you ensure that it any discovered issues are resolved?

Faculty management systems help administrative functions in an institution with tasks 
like course scheduling and follow-up reports.Scheduling the course saves a lot of time 
of the faculty which can be used for the better teaching.The faculty can register himself
in the portal with the credentials like username and password, while the admin plays a 
crucial role in managing the data of the faculty.The admin of the page can create,alter,
update and remove the data.
IF ISSUE IS RECOVERABLE: Apologising for the inconvenience caused and assuring that, 
currently working on it. Ensuring that the issue is recovered as soon as possible.
IF ISSUE IS IRRECOVERABLE: By asuring that coming back with the best option. Till then 
providing a temporary setup.
# Traceability links

This section discribes about the tracing of artifacts and their functional and non-functional requirements. It is identified by categories like Id,name, activities and the artifacts are determined by requirement Id linked to it.
## Use Case Diagram Traceability
| Artifact ID | Artifact Name | Requirement ID |
| :-------------: | :----------: | :----------: |
| Usecase1 | sign-in page | FR1, FR2, FR3 |
| Usecase2 | create faculty | FR6, FR8, FR10 |
| Usecase3 | update faculty | FR11, FR12, FR13 |
| Usecase4 | delete faculty | FR16, FR17, FR19 |
| Usecase5 | view faculty | FR21, FR22, FR24 |
## Class Diagram Traceability
| Artifact Name | Requirement ID |
| :-------------: |:----------: |
| Sign-in Page | FR1, FR2, FR3, NFR1, NFR5  |
| create Page | FR6, FR8, FR10, NFR7, NFR9 |
| update Page | FR11, FR13, FR15, NFR10 NFR13 |
| delete Page | FR16, FR17, FR19,  NFR17, NFR19 |
| view Page | FR21, FR22, FR23,NFR21,NFR24 |
## Activity Diagram Traceability
| Artifact ID | Artifact Name | Requirement ID |
| :-------------: | :----------: | :----------: |
| ActivityDiagram1 | ActivityDiagram1 | FR1, FR6, FR11, FR16, FR21, NFR1, NFR7, NFR11, NFR17, NFR25 |
| ActivityDiagram2 | ActivityDiagram2 | FR2, FR18, FR17,FR21, NFR1, NFR17, NFR21 |
# Software Artifacts
Software artifacts describes the design models of the website and the software requirements are included where the source codes are written and executed. Test models are also applied to test whether it is a desired outcome and it gives complete overview of how the program is executed.
* Link for [use case-activity diagrams](https://github.com/parashuram586/CIS641-I-m-Laker/tree/master/artifacts/functional-modelsuse-case-activity-diagrams.pdf) 
* Link for [crc-class-object diagrams](https://github.com/parashuram586/CIS641-I-m-Laker/tree/master/artifacts/functional-models/crc-class-object-diagrams.pf)
* Link for [WND](https://github.com/parashuram586/CIS641-I-m-Laker/tree/master/artifacts/functional-models/WND.pdf)
* Link for [use case description](https://github.com/parashuram586/CIS641-I-m-Laker/tree/master/artifacts/functional-models/use-case-description.pdf)
* Link for [hci](https://github.com/parashuram586/CIS641-I-m-Laker/tree/master/artifacts/functional-models/hci.pdf)
