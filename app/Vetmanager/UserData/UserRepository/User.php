<?php


namespace App\Vetmanager\UserData\UserRepository;


class User implements UserInterface
{
    protected $chatId;
    protected $domain;
    protected $token;
    protected $vmUserId;
    protected $channel;
    protected $notificationEnabled;

    public function __construct($chatId, $domain, $token, $vmUserId, $channel, $notificationEnabled=true)
    {
        $this->chatId = $chatId;
        $this->domain = $domain;
        $this->token = $token;
        $this->vmUserId = $vmUserId;
        $this->channel = $channel;
        $this->notificationEnabled = $notificationEnabled;
    }

    public function getId()
    {
        return $this->chatId;
    }

    public function getDomain()
    {
        return $this->domain;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function getVmUserId()
    {
        return $this->vmUserId;
    }

    public function getChannel()
    {
        return $this->channel;
    }

    public function isNotificationEnabled(): bool
    {
        return $this->notificationEnabled;
    }

    public function enableNotifications()
    {
        $this->notificationEnabled = true;
    }

    public function disableNotifications()
    {
        $this->notificationEnabled = false;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->getId(),
            'clinic_domain' => $this->getDomain(),
            'clinic_token' => $this->getToken(),
            'vm_user_id' => $this->getVmUserId(),
            'channel' => $this->getChannel(),
            'notification_enabled' => $this->isNotificationEnabled()
        ];
    }

    public function isAuthorized(): bool
    {
        return !empty($this->token);
    }
}