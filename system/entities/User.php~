<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="notify_email", type="string", length=1, nullable=false)
     */
    private $notifyEmail = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="notify_sms", type="string", length=1, nullable=false)
     */
    private $notifySms = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="email_verified", type="string", length=1, nullable=false)
     */
    private $EmailVerified = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="bedrijfsnaam", type="string", length=255, nullable=true)
     */
    private $bedrijfsnaam;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_type", type="integer", nullable=false)
     */
    private $userType;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_visit", type="datetime", nullable=false)
     */
    private $lastVisit;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="bday", type="date", nullable=true)
     */
    private $bday;

    /**
     * @var string
     *
     * @ORM\Column(name="adres", type="string", length=255, nullable=true)
     */
    private $adres;

    /**
     * @var string
     *
     * @ORM\Column(name="postcode", type="string", length=10, nullable=true)
     */
    private $postcode;

    /**
     * @var string
     *
     * @ORM\Column(name="woonplaats", type="string", length=255, nullable=true)
     */
    private $woonplaats;

    /**
     * @var string
     *
     * @ORM\Column(name="provincie", type="string", length=25, nullable=true)
     */
    private $provincie;

    /**
     * @var string
     *
     * @ORM\Column(name="land", type="string", length=255, nullable=true)
     */
    private $land;

    /**
     * @var string
     *
     * @ORM\Column(name="telefoonnummer", type="string", length=255, nullable=true)
     */
    private $telefoonnummer;

    /**
     * @var integer
     *
     * @ORM\Column(name="kvknummer", type="integer", nullable=true)
     */
    private $kvknummer;

    /**
     * @var string
     *
     * @ORM\Column(name="contactpersoon", type="string", length=255, nullable=true)
     */
    private $contactpersoon;

    /**
     * @var integer
     *
     * @ORM\Column(name="btwnummer", type="integer", nullable=true)
     */
    private $btwnummer;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=255, nullable=true)
     */
    private $facebook;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     */
    private $twitter;

    /**
     * @var string
     *
     * @ORM\Column(name="soundcloud", type="string", length=255, nullable=true)
     */
    private $soundcloud;

    /**
     * @var string
     *
     * @ORM\Column(name="linkedin", type="string", length=255, nullable=true)
     */
    private $linkedin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="register_date", type="date", nullable=false)
     */
    private $registerDate;

    /**
     * @var string
     *
     * @ORM\Column(name="lng", type="string", length=25, nullable=true)
     */
    private $lng;

    /**
     * @var string
     *
     * @ORM\Column(name="lat", type="string", length=25, nullable=true)
     */
    private $lat;

    /**
     * @var string
     *
     * @ORM\Column(name="session_id", type="string", length=255, nullable=true)
     */
    private $sessionId;

    /**
     * @var string
     *
     * @ORM\Column(name="huisnummer", type="string", length=10, nullable=true)
     */
    private $huisnummer;

    /**
     * @var string
     *
     * @ORM\Column(name="active", type="string", length=1, nullable=false)
     */
    private $active = 'Y';

    /**
     * @var string
     *
     * @ORM\Column(name="activate_key", type="string", length=255, nullable=true)
     */
    private $activateKey;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="activate_before", type="datetime", nullable=true)
     */
    private $activateBefore;

    /**
     * @var string
     *
     * @ORM\Column(name="profile_image", type="string", length=255, nullable=true)
     */
    private $profileImage;

    /**
     * @var integer
     *
     * @ORM\Column(name="credits", type="integer", nullable=false)
     */
    private $credits = 0;

    /**
     * @ORM\ManyToMany(targetEntity="Role", inversedBy="users")
     * @ORM\JoinTable(name="role_user")
     **/
    private $roles;

    public function __construct()
	{
        $this->roles = new \Doctrine\Common\Collections\ArrayCollection();
		$this->lastVisit = new \DateTime("now");
		$this->registerDate = new \DateTime("now");
	}

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set notifyEmail
     *
     * @param string $notifyEmail
     * @return User
     */
    public function setNotifyEmail($notifyEmail)
    {
        $this->notifyEmail = $notifyEmail;
    
        return $this;
    }

    /**
     * Get notifyEmail
     *
     * @return string 
     */
    public function getNotifyEmail()
    {
        return $this->notifyEmail;
    }

    /**
     * Set notifySms
     *
     * @param string $notifySms
     * @return User
     */
    public function setNotifySms($notifySms)
    {
        $this->notifySms = $notifySms;
    
        return $this;
    }

    /**
     * Get notifySms
     *
     * @return string 
     */
    public function getNotifySms()
    {
        return $this->notifySms;
    }

    /**
     * Set EmailVerified
     *
     * @param string $emailVerified
     * @return User
     */
    public function setEmailVerified($emailVerified)
    {
        $this->EmailVerified = $emailVerified;
    
        return $this;
    }

    /**
     * Get EmailVerified
     *
     * @return string 
     */
    public function getEmailVerified()
    {
        return $this->EmailVerified;
    }

    /**
     * Set bedrijfsnaam
     *
     * @param string $bedrijfsnaam
     * @return User
     */
    public function setBedrijfsnaam($bedrijfsnaam)
    {
        $this->bedrijfsnaam = $bedrijfsnaam;
    
        return $this;
    }

    /**
     * Get bedrijfsnaam
     *
     * @return string 
     */
    public function getBedrijfsnaam()
    {
        return $this->bedrijfsnaam;
    }

    /**
     * Set userType
     *
     * @param integer $userType
     * @return User
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;
    
        return $this;
    }

    /**
     * Get userType
     *
     * @return integer 
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set lastVisit
     *
     * @param \DateTime $lastVisit
     * @return User
     */
    public function setLastVisit($lastVisit)
    {
        $this->lastVisit = $lastVisit;
    
        return $this;
    }

    /**
     * Get lastVisit
     *
     * @return \DateTime 
     */
    public function getLastVisit()
    {
        return $this->lastVisit;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set bday
     *
     * @param \DateTime $bday
     * @return User
     */
    public function setBday($bday)
    {
        $this->bday = $bday;
    
        return $this;
    }

    /**
     * Get bday
     *
     * @return \DateTime 
     */
    public function getBday()
    {
        return $this->bday;
    }

    /**
     * Set adres
     *
     * @param string $adres
     * @return User
     */
    public function setAdres($adres)
    {
        $this->adres = $adres;
    
        return $this;
    }

    /**
     * Get adres
     *
     * @return string 
     */
    public function getAdres()
    {
        return $this->adres;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     * @return User
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    
        return $this;
    }

    /**
     * Get postcode
     *
     * @return string 
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set woonplaats
     *
     * @param string $woonplaats
     * @return User
     */
    public function setWoonplaats($woonplaats)
    {
        $this->woonplaats = $woonplaats;
    
        return $this;
    }

    /**
     * Get woonplaats
     *
     * @return string 
     */
    public function getWoonplaats()
    {
        return $this->woonplaats;
    }

    /**
     * Set provincie
     *
     * @param string $provincie
     * @return User
     */
    public function setProvincie($provincie)
    {
        $this->provincie = $provincie;
    
        return $this;
    }

    /**
     * Get provincie
     *
     * @return string 
     */
    public function getProvincie()
    {
        return $this->provincie;
    }

    /**
     * Set land
     *
     * @param string $land
     * @return User
     */
    public function setLand($land)
    {
        $this->land = $land;
    
        return $this;
    }

    /**
     * Get land
     *
     * @return string 
     */
    public function getLand()
    {
        return $this->land;
    }

    /**
     * Set telefoonnummer
     *
     * @param string $telefoonnummer
     * @return User
     */
    public function setTelefoonnummer($telefoonnummer)
    {
        $this->telefoonnummer = $telefoonnummer;
    
        return $this;
    }

    /**
     * Get telefoonnummer
     *
     * @return string 
     */
    public function getTelefoonnummer()
    {
        return $this->telefoonnummer;
    }

    /**
     * Set kvknummer
     *
     * @param integer $kvknummer
     * @return User
     */
    public function setKvknummer($kvknummer)
    {
        $this->kvknummer = $kvknummer;
    
        return $this;
    }

    /**
     * Get kvknummer
     *
     * @return integer 
     */
    public function getKvknummer()
    {
        return $this->kvknummer;
    }

    /**
     * Set contactpersoon
     *
     * @param string $contactpersoon
     * @return User
     */
    public function setContactpersoon($contactpersoon)
    {
        $this->contactpersoon = $contactpersoon;
    
        return $this;
    }

    /**
     * Get contactpersoon
     *
     * @return string 
     */
    public function getContactpersoon()
    {
        return $this->contactpersoon;
    }

    /**
     * Set btwnummer
     *
     * @param integer $btwnummer
     * @return User
     */
    public function setBtwnummer($btwnummer)
    {
        $this->btwnummer = $btwnummer;
    
        return $this;
    }

    /**
     * Get btwnummer
     *
     * @return integer 
     */
    public function getBtwnummer()
    {
        return $this->btwnummer;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return User
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    
        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     * @return User
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    
        return $this;
    }

    /**
     * Get facebook
     *
     * @return string 
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     * @return User
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    
        return $this;
    }

    /**
     * Get twitter
     *
     * @return string 
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set soundcloud
     *
     * @param string $soundcloud
     * @return User
     */
    public function setSoundcloud($soundcloud)
    {
        $this->soundcloud = $soundcloud;
    
        return $this;
    }

    /**
     * Get soundcloud
     *
     * @return string 
     */
    public function getSoundcloud()
    {
        return $this->soundcloud;
    }

    /**
     * Set linkedin
     *
     * @param string $linkedin
     * @return User
     */
    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;
    
        return $this;
    }

    /**
     * Get linkedin
     *
     * @return string 
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * Set registerDate
     *
     * @param \DateTime $registerDate
     * @return User
     */
    public function setRegisterDate($registerDate)
    {
        $this->registerDate = $registerDate;
    
        return $this;
    }

    /**
     * Get registerDate
     *
     * @return \DateTime 
     */
    public function getRegisterDate()
    {
        return $this->registerDate;
    }

    /**
     * Set lng
     *
     * @param string $lng
     * @return User
     */
    public function setLng($lng)
    {
        $this->lng = $lng;
    
        return $this;
    }

    /**
     * Get lng
     *
     * @return string 
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * Set lat
     *
     * @param string $lat
     * @return User
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    
        return $this;
    }

    /**
     * Get lat
     *
     * @return string 
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set sessionId
     *
     * @param string $sessionId
     * @return User
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;
    
        return $this;
    }

    /**
     * Get sessionId
     *
     * @return string 
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * Set huisnummer
     *
     * @param string $huisnummer
     * @return User
     */
    public function setHuisnummer($huisnummer)
    {
        $this->huisnummer = $huisnummer;
    
        return $this;
    }

    /**
     * Get huisnummer
     *
     * @return string 
     */
    public function getHuisnummer()
    {
        return $this->huisnummer;
    }

    /**
     * Set active
     *
     * @param string $active
     * @return User
     */
    public function setActive($active)
    {
        $this->active = $active;
    
        return $this;
    }

    /**
     * Get active
     *
     * @return string 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set activateKey
     *
     * @param string $activateKey
     * @return User
     */
    public function setActivateKey($activateKey)
    {
        $this->activateKey = $activateKey;
    
        return $this;
    }

    /**
     * Get activateKey
     *
     * @return string 
     */
    public function getActivateKey()
    {
        return $this->activateKey;
    }

    /**
     * Set activateBefore
     *
     * @param \DateTime $activateBefore
     * @return User
     */
    public function setActivateBefore($activateBefore)
    {
        $this->activateBefore = $activateBefore;
    
        return $this;
    }

    /**
     * Get activateBefore
     *
     * @return \DateTime 
     */
    public function getActivateBefore()
    {
        return $this->activateBefore;
    }

    /**
     * Set profileImage
     *
     * @param string $profileImage
     * @return User
     */
    public function setProfileImage($profileImage)
    {
        $this->profileImage = $profileImage;
    
        return $this;
    }

    /**
     * Get profileImage
     *
     * @return string 
     */
    public function getProfileImage()
    {
        return $this->profileImage;
    }

    /**
     * Set credits
     *
     * @param integer $credits
     * @return User
     */
    public function setCredits($credits)
    {
        $this->credits = $credits;
    
        return $this;
    }

    /**
     * Get credits
     *
     * @return integer 
     */
    public function getCredits()
    {
        return $this->credits;
    }

    /**
     * Add roles
     *
     * @param \Role $roles
     * @return User
     */
    public function addRole(\Role $roles)
    {
        $this->roles[] = $roles;
    
        return $this;
    }

    /**
     * Remove roles
     *
     * @param \Role $roles
     */
    public function removeRole(\Role $roles)
    {
        $this->roles->removeElement($roles);
    }

    /**
     * Get roles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRoles()
    {
        return $this->roles;
    }
}
